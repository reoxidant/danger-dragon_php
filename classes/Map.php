<?php

namespace app\classes;

class Map
{
    private $grid;
    private $jsonGridMap;
    private $numberOfLevel = 1;

    public function loadLevelOnTheMap($loadedNewMap = null)
    {
        if ($loadedNewMap == null) {
            $this->jsonGridMap = json_decode(file_get_contents('./maps/map' . $this->numberOfLevel . '.json'));
        } else {
            $this->jsonGridMap = $loadedNewMap;
        }
    }

    public function renderMap()
    {
        $this->grid = "<div id='map'>";
        foreach ($this->jsonGridMap as $verticalColumnMap) {
            foreach ($verticalColumnMap as $key => $cellMap) {
                $this->grid .= $this->getRenderMapCell($cellMap, $key);
            }
        }
        $this->grid .= "</div>";
    }

    private function getRenderMapCell($itemMap, $key)
    {
        switch ($itemMap) {
            case 'W':
                return '<button type="button" disabled class="btn btn-secondary map-item map-item-'.$key.'">&nbsp;</button>';
            case 'P':
                return '<button type="button" disabled class="player btn btn-light map-item map-item-'.$key.'">&nbsp;</button>';
            case 'D':
                return '<button type="button" disabled class="dragon btn btn-light map-item map-item-'.$key.'">&nbsp;</button>';
            case 'X':
                return '<button type="button" disabled class="door btn btn-light map-item map-item-'.$key.'">&nbsp;</button>';
            default:
                return '<button type="button" disabled class="btn btn-light map-item map-item-'.$key.'">&nbsp;</button>';
        }
    }

    /**
     * @return mixed
     */
    public function getGridOfMap()
    {
        return $this -> grid;
    }

}