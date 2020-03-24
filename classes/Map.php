<?php

namespace classes;

class Map{
    private $instanceOfMap;
    private $numberOfLevelMap = 1;
    private $errors = [];
    private $arrAvailableWaysOnTheMap = ['.', 'C'];

    public function __construct($loadedNewMap = null){
        if($loadedNewMap == null){
            $this->instanceOfMap = json_decode(file_get_contents('maps/map'. $this->numberOfLevelMap.'.json'));
        }else{
            $this->instanceOfMap = $loadedNewMap;
        }
    }

    public function show_error(){
        return $this->errors;
    }

    public function movePlayer($player) {
        foreach($this->instanceOfMap as $keyRowMap => $rowMapArray) {
            $player->checkIfPlayerHaveAllCoins($this->instanceOfMap, $keyRowMap);
            if ($playerKeyOnTheRowMap = array_search('P', $this->instanceOfMap[$keyRowMap], true)) {
                $player->definePlayerPosition($playerKeyOnTheRowMap, $keyRowMap);
                $player->moveLeft($this->instanceOfMap, $rowMapArray, $_POST, $rowMapArray[$playerKeyOnTheRowMap - 1], $this->arrAvailableWaysOnTheMap);
                $player->moveRight($this->instanceOfMap, $rowMapArray, $_POST, $rowMapArray[$playerKeyOnTheRowMap + 1], $this->arrAvailableWaysOnTheMap);
                $player->moveUp($this->instanceOfMap, $_POST, $this->arrAvailableWaysOnTheMap);
                $player->moveDown($this->instanceOfMap, $_POST, $this->arrAvailableWaysOnTheMap);
            }
        }
    }
}
$player = new Player();

$numberNewMap = null;
$numberOfLevelMap = 1;

$map = new Map($numberNewMap, $numberOfLevelMap);
$map->movePlayer($player);
$ERRORS['map_errors'] = $map->show_error();