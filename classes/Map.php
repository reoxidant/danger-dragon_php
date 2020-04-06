<?php

namespace classes;

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
        foreach ($this->jsonGridMap as $verticalColumnMap) {
            foreach ($verticalColumnMap as $key => $cellMap) {
                if ($cellMap = 'X') {
                    $this->grid .= '<button type="button" disabled class="btn btn-secondary board">&nbsp;</button>';
                } else if ($cellMap == 'P') {
                    $this->grid .= '<button type="button" disabled class="btn btn-primary board"><span class="fas fa-user"></span></button>';
                } else if ($cellMap == 'E') {
                    $this->grid .= '<button type="button" disabled class="btn btn-danger board"><span class="fas fa-dragon"></span></button>';
                } else if ($cellMap == 'D') {
                    if ($this->collected_all_coins == true) {
                        $this->grid .= '<button type="button" disabled class="btn btn-success board"><span class="fas fa-door-open"></span></button>';
                    } else {
                        $this->grid .= '<button type="button" disabled class="btn btn-secondary board"><span class="fas fa-door-closed"></span></button>';
                    }
                } else if ($cellMap == 'O') {
                    $this->grid .= '<button type="button" disabled class="btn btn-danger board">&nbsp;</button>';
                } else if ($cellMap == 'C') {
                    $this->grid .= '<button type="button" disabled class="btn btn-warning board">&nbsp;</button>';
                } else {
                    $this->grid .= '<button type="button" disabled class="btn btn-light board">&nbsp;</button>';
                }
            }
        }

        return $this->grid;
    }
}