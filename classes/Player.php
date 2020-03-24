<?php

namespace classes;

class Player
{
    private $playerIsAlive;
    private $playerPositionKey;
    private $playerPositionKeyRow;
    private $playerMovedToNewPointOnTheMap = false;
    private $number_level_map = 0;
    private $playerCollectedCoins = true;

    public function definePlayerPosition($keyPlayerInArray, $keyPlayerRowArray)
    {
        $this->playerPositionKey = $keyPlayerInArray;
        $this->playerPositionKeyRow = $keyPlayerRowArray;
    }

    public function checkIfPlayerHaveAllCoins($mapArray, $keyRowMapArray)
    {
        if ($keyCoins = array_search('C', $mapArray[$keyRowMapArray], true)) {
            $this->playerCollectedCoins = false;
            return true;
        } else {
            $this->playerCollectedCoins = true;
            return false;
        }
    }

    public function moveLeft($mapArray, $rowMapArray, $post, $pointPlayerWillBeOnTheMap, $arrAvailableWaysOnTheMap)
    {
        if ($post['playerDirectionMove'] == 'left' and in_array($pointPlayerWillBeOnTheMap, $arrAvailableWaysOnTheMap)) {
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey - 1] = 'P';

            $this->playerPositionKey = $this->playerPositionKey - 1;

            $this->playerMovedToNewPointOnTheMap = true;

            $this->checkIfPlayerIsFinish($rowMapArray[$this->playerPositionKey - 1]);
        } else {
            return false;
        }
    }

    public function moveRight($mapArray, $rowMapArray, $post, $nextPointPlayerWillBe, $arrAvailableWaysOnTheMap)
    {
        if ($post['playerDirectionMove'] == 'right' and in_array($nextPointPlayerWillBe, $arrAvailableWaysOnTheMap)) {
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
            $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey + 1] = 'P';

            $this->playerPositionKey = $this->playerPositionKey + 1;

            $this->playerMovedToNewPointOnTheMap = true;

            $this->checkIfPlayerIsFinish($rowMapArray[$this->playerPositionKey + 1]);
        } else {
            return false;
        }
    }

    public function moveUp($mapArray, $post, $arrAvailableWaysOnTheMap)
    {
        if ($this->playerMovedToNewCellOnTheMap == false) {
            if ($post['playerDirectionMove'] == 'up' and in_array($mapArray[$this->playerPositionKeyRow - 1][$this->playerPositionKey], $arrAvailableWaysOnTheMap)) {
                $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
                $mapArray[$this->playerPositionKeyRow - 1][$this->playerPositionKey] = 'P';

                $this->playerPositionKeyRow -= 1;

                $this->playerMovedToNewPointOnTheMap = true;
            }
        }
    }

    public function moveDown($map1Array, $post, $arrAvailableWaysOnTheMap)
    {
        if ($this->playerMovedToNewCellOnTheMap == false) {
            if ($post['playerDirectionMove'] == 'down' and in_array($mapArray[$this->playerPositionKeyRow + 1][$this->playerPositionKey], $arrAvailableWaysOnTheMap)) {
                $mapArray[$this->playerPositionKeyRow][$this->playerPositionKey] = '.';
                $mapArray[$this->playerPositionKeyRow + 1][$this->playerPositionKey] = 'P';

                $this->playerPositionKeyRow += 1;

                $this->playerMovedToNewPointOnTheMap = true;
            }
        }
    }
}