<?php

namespace classes;

class Map{
    private $instanceOfMap;
    private $numberOfLevel;
    private $errors = [];

    public function __construct($loadedNewMap){
        if($loadedNewMap == null){
            $this->instanceOfMap = json_decode(file_get_contents('map'. $this->numberOfLevel));
        }else{
            $this->instanceOfMap = $loadedNewMap;
        }
    }

    public function show_error(){
        return $this->errors;
    }
}