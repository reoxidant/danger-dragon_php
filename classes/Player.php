<?php

namespace classes;

class Player{
    private $playerIsAlive;
    private $playerPositionKey;
    private $playerPositionKeyRow;
    private $playerMovedToNewPointOnTheMap = false;
    private $number_level_map = 0;
    private $playerCollectedCoins = true;

    public function definePlayerPosition($keyPlayerInArray, $keyPlayerRowArray){
        $this->playerPositionKey = $keyPlayerInArray;
        $this->playerPositionKeyRow = $keyPlayerRowArray;
    }

    public function checkIfPlayerHaveAllCoins($mapArray, $keyRowMapArray){
        if ($keyCoins = array_search('C', $mapArray[$keyRowMapArray], true)) {
            $this->playerCollectedCoins = false;
            return true;
        }else{
            $this->playerCollectedCoins = true;
            return false;
        }
    }

    public function moveLeft($mapArray, $rowMapArray, $post, $pointPlayerWillBeOnTheMap, $arrAvailableWaysOnTheMap){
        if($post['playerDirection'] == 'left' and in_array($pointPlayerWillBeOnTheMap, $arrAvailableWaysOnTheMap)){
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey - 1] = 'P';

            $this->playerPositionKey = $this->playerPositionKey - 1;

            $this->playerMovedToNewPointOnTheMap = true;

            $this->checkIfPlayerIsFinish($rowMapArray[$this->playerPositionKey - 1]);
        }else{
            return false;
        }
    }

    public function moveRight($mapArray, $rowMapArray, $post, $nextPointPlayerWillBe, $arrAvailableWaysOnTheMap){
        if ($post['playerDirection'] == 'right' and in_array($nextPointPlayerWillBe, $arrAvailableWaysOnTheMap)) {
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey + 1] = 'P';

            $this->playerPositionKey = $this->playerPositionKey + 1;

            $this->playerMovedToNewPointOnTheMap = true;

            $this->checkIfPlayerIsFinish($rowMapArray[$this->playerPositionKey + 1]);
        }else{
            return false;
        }
    }

    public function moveUp($mapArray, $post, $arrAvailableWaysOnTheMap){
        if($this->playerMovedToNewCellOnTheMap == false){
            if ($post['playerDirection'] == 'up' and in_array($mapArray[$this->playerPositionKeyRow - 1][$this->playerPositionKey], $arrAvailableWaysOnTheMap)) {
                $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
                $mapArray[$this->playerPositionKeyRow - 1][$this->playerPositionKey] = 'P';

                $this->playerPositionKeyRow -= 1;

                $this->playerMovedToNewPointOnTheMap = true;
            }
        }
    }

    public function moveDown($mapArray, $post, $arrAvailableWaysOnTheMap){
        if($this->playerMovedToNewCellOnTheMap == false){
            if ($post['playerDirection'] == 'down' and in_array($mapArray[$this->playerPositionKeyRow + 1][$this->playerPositionKey], $arrAvailableWaysOnTheMap)) {
                $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
                $mapArray[$this->playerPositionKeyRow + 1][$this->playerPositionKey] = 'P';

                $this->playerPositionKeyRow += 1;

                $this->playerMovedToNewPointOnTheMap = true;
            }
        }
    }


    private function checkIfPlayerIsFinish($valuePointMapToGoThePlayer, $finish = 'D'){
        if($valuePointMapToGoThePlayer == $finish) {
            //next maps level
            return setcookie("number_level_map", $this->number_level_map + 1, time()+3600, '/');
        }
        return false;
    }
}