<?php

namespace App\Controllers;

use Base\Controller;
use Core\mail\MailerComponent;

class AccountController extends Controller
{
    public $layout;
    public mixed $view;

    public function loginAction()
    {
        if (isset($_SESSION['user'])) {
            $this->doRedirect('/user');
        } elseif (!empty($_POST)) {
            $user = $this->model->getUser($_POST['login'], $_POST['password']);
            if ($user == false) {
                $_SESSION['message'] = 'Невірний логін або пароль';
            } else {
                $_SESSION['user'] = [
                    'full_name' => $user['full_name'],
                    'login' => $user['login']
                ];
                $this->doRedirect('/user');
            }
        }
    }

    public function registerAction()
    {
        if (!empty($_POST)) {
            if ($_POST['password'] === $_POST['password_confirm']) {
                if ($this->model->loginAlreadyExists($_POST['login'])) {
                    $_SESSION['message'] = 'Користувач з таким логіном вже існує!';
                    $this->doRedirect('/register');
                } elseif ($this->model->emailAlreadyExists($_POST['email'])) {
                    $_SESSION['message'] = 'Користувач з таким email вже існує!';
                    $this->doRedirect('/register');
                } else {
                    $this->model->registerUser(
                        $_POST['full_name'],
                        $_POST['login'],
                        $_POST['email'],
                        $_POST['password']
                    );
                    MailerComponent::sendEmail($_POST['email'], $_POST['login'], $_POST['full_name']);
                    $_SESSION['message'] = 'Реєстрація пройшла успішно!';
                    $this->doRedirect('/login');
                }
            } else {
                $_SESSION['message'] = 'Паролі не співпадають';
                $this->doRedirect('/register');
            }
        }
    }

    public function userAction()
    {
        $this->set([
            'isProfilePage' => true
        ]);
    }

    public function logoutAction()
    {
        session_destroy();
        $this->doRedirect('/');
    }
}
