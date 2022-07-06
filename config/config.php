<?php

/**
 * DB settings
 */

const DB_HOST = 'a_level_nix_mysql:3306';
const DB_NAME = 'a_level_nix_mysql';
const DB_USER = 'root';
const DB_PASSWORD = 'cbece_gead-cebfa';
const OPTIONS = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
];
