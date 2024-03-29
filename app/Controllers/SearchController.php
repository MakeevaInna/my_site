<?php

namespace App\Controllers;

use Base\Controller;
use Exceptions\IdNotFound;
use App\Models\Storage;
use Innette\Logger\FileStaticLogger;

class SearchController extends Controller
{
    private Storage $storage;

    public function __construct($route)
    {
        parent::__construct($route);
        $storageArray = require '../db/storage.php';
        $this->storage = new Storage($storageArray);
    }

    public function searchAction(): void
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
            'content' => $resultMessage,
            'title' => 'Пошук',
        ]);
    }
}
