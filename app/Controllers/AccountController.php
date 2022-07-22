<?php

namespace App\Controllers;

use Base\Controller;
use Core\mail\MailerTransport;
use Core\mail\Message;

class AccountController extends Controller
{
    public $layout;
    public mixed $view;

    public function loginAction()
    {
        $this->set([
            'title' => 'Авторизація'
        ]);
        if (isset($_SESSION['user'])) {
            $this->doRedirect('/user');
        } elseif (!empty($_POST)) {
            $user = $this->model->getUser($_POST['login']);
            if ($user !== false) {
                if ($user['verify_key'] != 1) {
                    $_SESSION['message'] = 'Спочатку необхідно підтвердити email';
                } elseif (!password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['message'] = 'Невірний пароль';
                } else {
                    $_SESSION['user'] = [
                        'full_name' => $user['full_name'],
                        'login' => $user['login']
                    ];
                    $this->doRedirect('/user');
                }
            } else {
                $_SESSION['message'] = 'Невірний логін';
            }
        }
    }

    public function registerAction()
    {
        $this->set([
            'title' => 'Реєстрація'
        ]);
        if (!empty($_POST)) {
            if ($_POST['password'] === $_POST['password_confirm']) {
                if ($this->model->loginAlreadyExists($_POST['login'])) {
                    $_SESSION['message'] = 'Користувач з таким логіном вже існує!';
                    $this->doRedirect('/register');
                } elseif ($this->model->emailAlreadyExists($_POST['email'])) {
                    $_SESSION['message'] = 'Користувач з таким email вже існує!';
                    $this->doRedirect('/register');
                } else {
                    $user['verify_key'] = md5(rand(100, 999) . $_POST['login']);
                    $user['finite_password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->model->registerUser(
                        $_POST['full_name'],
                        $_POST['login'],
                        $_POST['email'],
                        $user['finite_password'],
                        $user['verify_key'],
                    );
                    Message::createConfirmMessage($_POST['full_name'], $user['verify_key']);
                    MailerTransport::sendEmail($_POST['email'], 'Confirmation', Message::$message);
                    $_SESSION['message'] = 'Реєстрація пройшла успішно! Підтвердіть свій email.';
                    $this->doRedirect('/login');
                }
            } else {
                $_SESSION['message'] = 'Паролі не співпадають';
                $this->doRedirect('/register');
            }
        }
    }

    public function confirmAction()
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->model->confirm($uri[2]);
    }

    public function userAction()
    {
        $this->set([
            'title' => 'Кабінет',
            'isProfilePage' => true
        ]);
    }

    public function logoutAction()
    {
        session_destroy();
        $this->doRedirect('/');
    }
}
