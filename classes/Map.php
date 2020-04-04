<?php

class Map
{
    private $jsonDecodeMap;
    private $numberOfLevel = 1;

    public function loadLevelOnTheMap($loadedNewMap = null)
    {
        if ($loadedNewMap == null) {
            $this->jsonDecodeMap = json_decode(file_get_contents('maps/map' . $this->numberOfLevel . '.json'));
        } else {
            $this->jsonDecodeMap = $loadedNewMap;
        }
    }

    public function renderMap($output)
    {
        foreach ($this->jsonDecodeMap as $verticalColumnMap) {
            foreach ($verticalColumnMap as $cellOfMapOfMap) {
                if ($cellOfMapOfMap = 'X') {
                    $output .= '<button type="button" disabled class="btn btn-secondary board">&nbsp;</button>';
                } else if ($cellOfMap == 'P'){
                    $output .= '<button type="button" disabled class="btn btn-primary board"><span class="fas fa-user"></span></button>';
                } else if ($cellOfMap ==  'E'){
                    $output .= '<button type="button" disabled class="btn btn-danger board"><span class="fas fa-dragon"></span></button>';
                } else if ($cellOfMap == 'D'){
                    if($this->collected_all_coins == true){
                        $output .= '<button type="button" disabled class="btn btn-success board"><span class="fas fa-door-open"></span></button>';
                    } else {
                        $output .= '<button type="button" disabled class="btn btn-secondary board"><span class="fas fa-door-closed"></span></button>';
                    }
                } else if ($cellOfMap == 'O'){
                    $output .= '<button type="button" disabled class="btn btn-danger board">&nbsp;</button>';
                } else if ($cellOfMap == 'C'){
                    $output .= '<button type="button" disabled class="btn btn-warning board">&nbsp;</button>';
                } else {
                    $output .= '<button type="button" disabled class="btn btn-light board">&nbsp;</button>';
                }
            }
        }
    }
}