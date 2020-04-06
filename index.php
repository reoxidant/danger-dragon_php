<?php
require_once(__DIR__ . '/lang/install.php');
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/lib.php');
//classes
require_once(__DIR__ . '/classes/Engine.php');
require_once(__DIR__ . '/classes/Player.php');
require_once(__DIR__ . '/classes/Map.php');

use classes\Engine;

$gameEngine = new Engine();
$gameEngine->run();

echo $OUTPUT;
?>