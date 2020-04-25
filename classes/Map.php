<?php

namespace app\classes;

class Map
{
    private $grid;
    private $jsonGridMap;
    private $numberOfLevel = 1;


    private function getRenderMapCell($itemMap, $key, $takeAllKeys = null)
    {
        switch ($itemMap) {
            case 'W':
                return '<button type="button" disabled class="btn btn-secondary map-item map-item-'.$key.'">&nbsp;</button>';
            case 'P':
                return '<button type="button" disabled class="btn btn-secondary map-item map-item-'.$key.'">&nbsp;</button>';
            case 'D':
                return '<button type="button" disabled class="btn btn-secondary map-item map-item-'.$key.'">&nbsp;</button>';
            case 'X':
                if ($takeAllKeys == true) {
                    return '<button type="button" disabled class="btn btn-success map-item map-item-'.$key.'"><span class="fas fa-door-open"></span></button>';
                } else {
                    return '<button type="button" disabled class="btn btn-secondary map-item map-item-'.$key.'"><span class="fas fa-door-closed"></span></button>';
                }
            default:
                return '<button type="button" disabled class="btn btn-light map-item map-item-'.$key.'">&nbsp;</button>';
        }
    }

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
                $this->grid .= $this->getRenderMapCell($cellMap, $key, $this->collectAllKeys);
            }
        }
        $this->grid .= "</div>";
        return $this->grid;
    }

}