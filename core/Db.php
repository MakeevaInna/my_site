<?php

namespace Core;

use Innette\Logger\FileStaticLogger;

require_once ROOT . '/config/config.php';

class DB
{
    private static DB $dbObject;
    private \PDO $dbConnection;

    private function __clone()
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
            print "Помілка підключення до бази данних!";
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
        return self::$dbObject->dbConnection;
    }
}
