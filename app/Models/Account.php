<?php

namespace App\Models;

use Base\Model;

class Account extends Model
{
    public function getUser($login)
    {
        $sql = "SELECT *
                  FROM `users`
                 WHERE `login` = :login";
        $params = ['login' => $login];
        return $this->executeSql($sql, $params)->fetch();
    }

    public function registerUser($fullName, $login, $email, $password, $verify_key)
    {
        $sql = "INSERT INTO `users` (`full_name`, `login`, `email`, `password`, `verify_key`)
                     VALUES (:full_name, :login, :email, :password, :verify_key)";
        $params = ['full_name' => $fullName,'login' => $login, 'email' => $email, 'password' => $password, 'verify_key' => $verify_key];
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

    public function confirm(string $verify_key)
    {
        $sql = "UPDATE `users` SET `verify_key` = '1' WHERE (`verify_key` = '$verify_key')";
        $this->executeSql($sql);
    }
}
