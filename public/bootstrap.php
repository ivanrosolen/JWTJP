<?php

define('DS',       DIRECTORY_SEPARATOR );
define('APP_ROOT', realpath(__DIR__ . DS . '..') );

$composer_autoload = APP_ROOT . DS . 'vendor' . DS . 'autoload.php';

if ( false === file_exists($composer_autoload) ) {
    exit('Please install composer');
}

require $composer_autoload;

chdir(APP_ROOT);