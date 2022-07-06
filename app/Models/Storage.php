<?php

namespace App\Models;

use Exceptions\IdNotFound;

class Storage
{
    private array $storage;
    public function __construct(array $storage)
    {
        $this->storage = $storage;
    }
    public function vitaminExists($id): bool
    {
        foreach ($this->storage as $key => $count) {
            if ($key == $id) {
                return true;
            }
        }
        throw new IdNotFound('Товар з артікулом ' . $id . ' не знайдено!');
    }
}
