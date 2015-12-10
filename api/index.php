<?php
/**
 * ATM API
 *
 * @author Renato Ribeiro
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

//composer autoload
require __DIR__ . DS . 'vendor' . DS . 'autoload.php';

//initialize app
$app = new \ATM\App\App(__DIR__);
$app->initialize();
