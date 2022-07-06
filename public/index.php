<?php

error_reporting(-1);

use Core\Router;
use Psr\Log\FileStaticLogger;

define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
const LAYOUT = 'default';

require ROOT . '/core/libs/functions.php';
require ROOT . '/vendor/autoload.php';

FileStaticLogger::init();
$new = new Router();
Router::run();
