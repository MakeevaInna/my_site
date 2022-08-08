<?php

namespace Base;

use Core\DB;
use Innette\Logger\FileStaticLogger;

abstract class Model
{
    protected \PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DB::getDbObject();
    }

    public function executeSql(string $sql, array $params = [])
    {
        try {
            $query = $this->dbConnection->prepare($sql);
            $query->execute($params);
            return $query;
        } catch (\Exception $exception) {
            $_SESSION['message'] = 'Виникла помилка при обробці запросу!';
            FileStaticLogger::error($exception->getMessage(), [
                'line' => $exception->getLine(),
                'file' => $exception->getFile()
            ]);
            header('Location: /');
        }
    }
}
