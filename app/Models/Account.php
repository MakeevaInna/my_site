<?php

namespace App\Models;

use Base\Model;

class Account extends Model
{
    public function getUser(string $login): bool|array
    {
        $sql = "SELECT *
                  FROM `users`
                 WHERE `login` = :login";
        $params = ['login' => $login];
        return $this->executeSql($sql, $params)->fetch();
    }

    public function registerUser(
        string $fullName,
        string $login,
        string $phone,
        string $email,
        string $password,
        string $verify_key
    ): void {
        $sql = "INSERT INTO `users` (`full_name`, `login`, `phone`, `email`, `password`, `verify_key`)
                     VALUES (:full_name, :login, :phone, :email, :password, :verify_key)";
        $params = ['full_name' => $fullName,'login' => $login, 'phone' => $phone, 'email' => $email,
            'password' => $password, 'verify_key' => $verify_key];
        $this->executeSql($sql, $params);
    }

    public function loginAlreadyExists(string $login): bool|array
    {
        $sql = "SELECT * FROM `users` WHERE `login` = :login";
        $params = ['login' => $login];
        return $this->executeSql($sql, $params)->fetch();
    }

    public function emailAlreadyExists(string $email): bool|array
    {
        $sql = "SELECT * FROM `users` WHERE `email` = :email";
        $params = ['email' => $email];
        return $this->executeSql($sql, $params)->fetch();
    }

    public function confirm(string $verify_key): void
    {
        $sql = "UPDATE `users` SET `verify_key` = '1' WHERE (`verify_key` = '$verify_key')";
        $this->executeSql($sql);
    }
}
