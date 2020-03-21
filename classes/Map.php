<?php

namespace classes;

class Map{
    private $instanceOfMap;
    private $numberOfLevelMap = 1;
    private $errors = [];

    public function __construct($loadedNewMap = null, $levelOfMapMustBe){
        if($loadedNewMap == null){
            $this->instanceOfMap = json_decode(file_get_contents('maps/map'. $this->numberOfLevelMap.'.json'));
        }else{
            $this->instanceOfMap = $loadedNewMap;
        }
    }

    public function show_error(){
        return $this->errors;
    }

    public function renderMap() {
        foreach($this->instanceOfMap as $key => $val) {
            if($key = array_search('C', $this->instanceOfMap[$key], true)){
                $this->errors[] = "enter to collecting point";
            }
            $this->errors[] = "i want to get any errors";
        }
    }
}

$numberNewMap = null;
$numberOfLevelMap = 1;

$map = new Map($numberNewMap, $numberOfLevelMap);
$map->renderMap();
$ERRORS['map_errors'] = $map->show_error();