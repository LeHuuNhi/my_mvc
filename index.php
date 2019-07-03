<?php
spl_autoload_register(function ($class) {

    $filename = 'libs/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});
spl_autoload_register(function ($class) {

    $filename = 'config/' . $class . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
});
$app = new Bootstrap();
?>