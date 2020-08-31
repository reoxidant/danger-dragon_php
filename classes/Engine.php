<?php

namespace app\classes;

require_once('InterfaceApp.php');

/**
 * Class Engine
 * @package app\classes
 */

class Engine
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @return array
     */
    public function show_error()
    {
        return $this->errors;
    }

    private function initMap($map){
        $map->loadLevelOnTheMap();
        $map->renderMap();
    }

    /**
     *
     */
    public function run()
    {
        global $OUTPUT;

        $map = new Map();

        if($map instanceof Map) {
            $this -> initMap($map);
        }

        $interface = new InterfaceApp();

        $player = new Player();

        if($_POST['playerDirectionMove'] ?? null){
            $player ->movePlayer();
        }

        $OUTPUT = $interface->renderPage($map->getGridOfMap());
    }

    /**
     * @param $valuePointMapToGoThePlayer
     * @param string $finish
     * @return bool
     */
    private function checkIfPlayerIsFinish($valuePointMapToGoThePlayer, $finish = 'D')
    {
        if ($valuePointMapToGoThePlayer == $finish) {
            //next maps level
            return setcookie("number_level_map", $this->number_level_map + 1, time() + 3600, '/');
        }
        return false;
    }
}