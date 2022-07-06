<?php

namespace App\Controllers;

use Base\Controller;
use Exceptions\IdNotFound;
use App\models\Storage;
use Psr\Log\FileStaticLogger;

class SearchController extends Controller
{
    private Storage $storage;
    public $view = 'search';

    public function __construct($route)
    {
        parent::__construct($route);
        $storageArray = require '../db/storage.php';
        $this->storage = new Storage($storageArray);
    }

    public function searchAction()
    {
        $resultMessage = '';
        $id = (int) $_GET['id'];
        try {
            $isFound = $this->storage->vitaminExists($id);
            if ($isFound) {
                $resultMessage = "Товар знайдено!";
            }
        } catch (IdNotFound $exception) {
            $resultMessage = 'Товар не знайдено!';
            FileStaticLogger::info($exception->getMessage(), [
                'line' => $exception->getLine(),
                'file' => $exception->getFile()
            ]);
        } catch (\Throwable $exception) {
            $resultMessage = 'Помилка пошуку!';
            FileStaticLogger::info($exception->getMessage(), [
                'line' => $exception->getLine(),
                'file' => $exception->getFile()
            ]);
        }
        $this->set([
            'content' => $resultMessage
        ]);
    }
}
