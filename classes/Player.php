<?php

namespace app\classes;

/**
 * Class Player
 */
class Player
{
    /**
     * @var
     */
    private $playerIsAlive;
    /**
     * @var
     */
    private $playerPositionKey;
    /**
     * @var
     */
    private $playerPositionKeyRow;
    /**
     * @var bool
     */
    private $playerMovedToNewPointOnTheMap = false;
    /**
     * @var bool
     */
    private $playerCollectedCoins = true;
    /**
     * @var string[]
     */
    private $playerAvailableWaysOnTheMap = ['.', 'C'];
    /**
     * @var null
     */
    private $map = null;


    /**
     * @param $keyPlayerInArray
     * @param $keyPlayerRowArray
     */
    public function definePlayerPosition($keyPlayerInArray, $keyPlayerRowArray)
    {
        $this->playerPositionKey = $keyPlayerInArray;
        $this->playerPositionKeyRow = $keyPlayerRowArray;
    }

    /**
     * @param $mapArray
     * @param $keyRowMapArray
     * @return bool
     */
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

    /**
     * @param $mapArray
     * @param $rowMapArray
     * @param $post
     * @param $pointPlayerWillBeOnTheMap
     * @param $arrAvailableWaysOnTheMap
     * @return false
     */
    private function moveLeft($mapArray, $rowMapArray, $post, $pointPlayerWillBeOnTheMap, $arrAvailableWaysOnTheMap)
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

    /**
     * @param $mapArray
     * @param $rowMapArray
     * @param $post
     * @param $nextPointPlayerWillBe
     * @param $arrAvailableWaysOnTheMap
     * @return false
     */
    private function moveRight($mapArray, $rowMapArray, $post, $nextPointPlayerWillBe, $arrAvailableWaysOnTheMap)
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

    /**
     * @param $mapArray
     * @param $post
     * @param $arrAvailableWaysOnTheMap
     */
    private function moveUp($mapArray, $post, $arrAvailableWaysOnTheMap)
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

    /**
     * @param $mapArray
     * @param $post
     * @param $arrAvailableWaysOnTheMap
     */
    private function moveDown($mapArray, $post, $arrAvailableWaysOnTheMap)
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

    /**
     *
     */
    public function movePlayer()
    {
        $this->map = new Map();
        foreach ($this->map as $keyRowMap => $rowMapArray) {
            $this->checkIfPlayerHaveAllCoins($this->map, $keyRowMap);
            if ($playerKeyOnTheRowMap = array_search('P', $this->map[$keyRowMap], true)) {
                $this->definePlayerPosition($playerKeyOnTheRowMap, $keyRowMap);
                $this->moveLeft($this->map, $rowMapArray, $_POST, $rowMapArray[$playerKeyOnTheRowMap - 1], $this->playerAvailableWaysOnTheMap);
                $this->moveRight($this->map, $rowMapArray, $_POST, $rowMapArray[$playerKeyOnTheRowMap + 1], $this->playerAvailableWaysOnTheMap);
                $this->moveUp($this->map, $_POST, $this->playerAvailableWaysOnTheMap);
                $this->moveDown($this->map, $_POST, $this->playerAvailableWaysOnTheMap);
            }
        }
    }
}