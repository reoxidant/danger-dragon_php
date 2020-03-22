<?php

namespace classes;

class Player{
    private $playerIsAlive;
    private $playerPositionKey;
    private $playerPositionRow;
    private $playerMovedToNewCellOnTheMap = false;

    public function move($key){
        $this->playerPositionKey = $key;
        $this->playerPositionRow = $key;
    }

    public function moveLeft($map, $keyRowMap, $post, $pointPlayerWillBeOnTheMap, $arrayWhatMustBeToGo){
        if($post['left'] != null and in_array($pointPlayerWillBeOnTheMap, $arrayWhatMustBeToGo)){
            $map[$keyRowMap][$this->playerPositionKey] = '.';
            $map[$keyRowMap][$this->playerPositionKey - 1] = 'P';

            $this->playerPositionKey = $this->playerPositionKey - 1;
            $this->playerPositionRow = $keyRowMap;

            $this->playerMovedToNewCellOnTheMap = true;
        }else{
            return false;
        }
    }

    public function moveUp(){

    }
    public function moveDown(){

    }
    public function moveRight(){

    }
}