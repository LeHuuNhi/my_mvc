<?php
spl_autoload_register(function ($class) {

    $filename = 'libs/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
    $filename = 'controller/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }

    $filename = 'model/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});
session_start();
include "config/database.php";
define('BP', __DIR__);
error_reporting(E_ALL);
ini_set('display_errors', 1);
$app = new Bootstrap();
