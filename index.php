<?php
require_once(__DIR__ . '/lang/install.php');
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/lib.php');
//classes
require_once(__DIR__ . '/classes/Engine.php');
require_once(__DIR__ . '/classes/Player.php');

$gameEngine = new Engine();
$gameEngine->renderPage();
//$gameEngine->renderInterface();
$player = new Player();


/*
if (!empty($_POST['playerDirectionMove'])) {
    $gameEngine->movePlayer($player);
}*/
?>