<?php

namespace App\Controllers;

use Base\Controller;
use Core\mail\MailerTransport;
use Core\mail\Message;
use Core\Session;

class AccountController extends Controller
{
    public function loginAction(): void
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
                    Session::set('message', 'Спочатку необхідно підтвердити email');
                } elseif (!password_verify($_POST['password'], $user['password'])) {
                    Session::set('message', 'Невірний пароль');
                } else {
                    Session::set('user', [
                        'id' => $user['id'],
                        'full_name' => $user['full_name'],
                        'phone' => $user['phone'],
                        'email' => $user['email'],
                        'login' => $user['login'],
                        ]);
                    $this->doRedirect('/user');
                }
            } else {
                Session::set('message', 'Невірний логін');
            }
        }
    }

    public function registerAction(): void
    {
        $this->set([
            'title' => 'Реєстрація'
        ]);
        if (!empty($_POST)) {
            if ($_POST['password'] === $_POST['password_confirm']) {
                if ($this->model->loginAlreadyExists($_POST['login'])) {
                    Session::set('message', 'Користувач з таким логіном вже існує!');
                    $this->doRedirect('/register');
                } elseif ($this->model->emailAlreadyExists($_POST['email'])) {
                    Session::set('message', 'Користувач з таким email вже існує!');
                    $this->doRedirect('/register');
                } else {
                    $user['verify_key'] = md5(rand(100, 999) . $_POST['login']);
                    $user['finite_password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $this->model->registerUser(
                        $_POST['full_name'],
                        $_POST['login'],
                        $_POST['phone'],
                        $_POST['email'],
                        $user['finite_password'],
                        $user['verify_key'],
                    );
                    Message::createConfirmMessage($_POST['full_name'], $user['verify_key']);
                    MailerTransport::sendUserEmail($_POST['email'], 'Confirmation', Message::$message);
                    Session::set('message', 'Реєстрація пройшла успішно! Підтвердіть свій email.');
                    $this->doRedirect('/login');
                }
            } else {
                Session::set('message', 'Паролі не співпадають');
                $this->doRedirect('/register');
            }
        }
    }

    public function confirmAction(): void
    {
        $uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $this->model->confirm($uri[2]);
    }

    public function userAction(): void
    {
        $this->set([
            'title' => 'Кабінет',
            'isProfilePage' => true
        ]);
    }

    public function logoutAction(): void
    {
        Session::destroy();
        $this->doRedirect('/');
    }
}
