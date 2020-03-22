<?php

namespace classes;

class Map{
    private $instanceOfMap;
    private $numberOfLevelMap = 1;
    private $errors = [];
    private $arrAvailablePathOnTheMap = ['.', 'C'];

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

    public function renderMap($player) {
        foreach($this->instanceOfMap as $keyRowMap => $rowMap) {
            if ($playerKeyOnTheRow = array_search('P', $this->instanceOfMap[$keyRowMap], true)) {
                $player->move($playerKeyOnTheRow);
//                var_dump($rowMap);
//                var_dump($playerKeyOnTheRow);
                $player->moveLeft($this->instanceOfMap, $keyRowMap, $_POST, $rowMap[$playerKeyOnTheRow - 1], $this->arrAvailablePathOnTheMap);

            }
        }
    }
}
$player = new Player();

$numberNewMap = null;
$numberOfLevelMap = 1;

$map = new Map($numberNewMap, $numberOfLevelMap);
$map->renderMap($player);
$ERRORS['map_errors'] = $map->show_error();