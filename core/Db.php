<?php

namespace Core;

use Psr\Log\FileStaticLogger;

require_once ROOT . '/config/config.php';

class DB
{
    private static $dbObject;
    private $dbConnection;

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    private function __construct()
    {
        try {
            $this->dbConnection = new \PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PASSWORD,
                OPTIONS
            );
        } catch (\PDOException $e) {
            print "Ошибка подключения к базе данных!";
            FileStaticLogger::error($e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
            die();
        }
    }

    public static function getDbObject()
    {
        if (!isset(self::$dbObject)) {
            self::$dbObject = new DB();
        }
        return self::$dbObject;
    }

    public function execute($sql)
    {
        $stmt = $this->dbConnection->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql)
    {
        $stmt = $this->dbConnection->prepare($sql);
        $res = $stmt->execute();
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }
}
