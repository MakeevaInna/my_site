<?php

error_reporting(-1);

use Core\Router;
use Innette\Logger\FileStaticLogger;

define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
const LAYOUT = 'default';

require ROOT . '/core/libs/functions.php';
require ROOT . '/vendor/autoload.php';

session_start();

FileStaticLogger::init();
Router::init();
Router::run();
