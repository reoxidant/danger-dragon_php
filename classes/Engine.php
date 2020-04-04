<?php

namespace classes;

use Map;

class Engine
{
    private $output;
    private $number_level_map;


    private function renderMap()
    {

    }

    private function renderInterface($output)
    {
        $output = '<div class="main-interface">';
        new Map()->

        $output .= '</div>';
    }

    public function renderHtml()
    {
        $this->output = file_get_contents('templates/header.html');

        $this->output .= $this->renderInterface($this->output);

        $this->output .= file_get_contents('templates/footer.html');

        return $this->output;
    }

    public function movePlayer($player)
    {
        foreach ($this->instanceOfMap as $keyRowMap => $rowMapArray) {
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

    private function checkIfPlayerIsFinish($valuePointMapToGoThePlayer, $finish = 'D')
    {
        if ($valuePointMapToGoThePlayer == $finish) {
            //next maps level
            return setcookie("number_level_map", $this->number_level_map + 1, time() + 3600, '/');
        }
        return false;
    }
}