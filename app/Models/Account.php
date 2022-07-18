<?php

namespace App\Models;

use Base\Model;

class Account extends Model
{
    public function getUser($login, $password)
    {
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        $sql = "SELECT *
                  FROM `users`
                 WHERE `login` = :login
                   AND `password` = :password";
        $params = ['login' => $login, 'password' => $password];
        return $this->executeSql($sql, $params)->fetch();
    }

    public function registerUser($fullName, $login, $email, $password)
    {
        $fullName = $_POST['full_name'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `users` (`full_name`, `login`, `email`, `password`)
                     VALUES (:full_name, :login, :email, :password)";
        $params = ['full_name' => $fullName,'login' => $login, 'email' => $email, 'password' => md5($password)];
        $this->executeSql($sql, $params);
    }

    public function loginAlreadyExists($login)
    {
        $sql = "SELECT * FROM `users` WHERE `login` = :login";
        $params = ['login' => $login];
        return $this->executeSql($sql, $params)->fetch();
    }

    public function emailAlreadyExists($email)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = :email";
        $params = ['email' => $email];
        return $this->executeSql($sql, $params)->fetch();
    }
}
