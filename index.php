<?php

use classes\Map;

spl_autoload_register(function($class) {
    $ds = DIRECTORY_SEPARATOR;
    $filename = $_SERVER['DOCUMENT_ROOT'] . $ds . str_replace('\\', $ds, $class) . '.php';
    require($filename);
});

ini_set('error_reporting', E_ERROR);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$OUTPUT .= file_get_contents('templates/header.html');

function initGameEngine(&$output){
    $map = new Map();
}

initGameEngine($OUTPUT);

$OUTPUT .= file_get_contents('templates/footer.html');
?>