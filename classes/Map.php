<?php

namespace classes;

class Map
{
    private $instanceOfMap;
    private $numberOfLevelMap = 1;
    private $errors = [];
    private $arrAvailableWaysOnTheMap = ['.', 'C'];

    public function show_error()
    {
        return $this->errors;
    }
    public function loadNewLevel($loadedNewMap = null)

    {
        if ($loadedNewMap == null) {
            $this->instanceOfMap = json_decode(file_get_contents('maps/map' . $this->numberOfLevelMap . '.json'));
        } else {
            $this->instanceOfMap = $loadedNewMap;
        }
    }

    public function renderMap($output)
    {
        foreach ($this->instanceOfMap as $verticalColumn) {
            foreach ($verticalColumn as $cell) {
                if ($cell = 'X') {
                    $output .= '<button type="button" disabled class="btn btn-secondary board">&nbsp;</button>';
                } else if ($cell == 'P'){
                    $output .= '<button type="button" disabled class="btn btn-primary board"><span class="fas fa-user"></span></button>';
                } else if ($cell ==  'E'){
                    $output .= '<button type="button" disabled class="btn btn-danger board"><span class="fas fa-dragon"></span></button>';
                } else if ($cell == 'D'){
                    if($this->collected_all_coins == true){
                        $output .= '<button type="button" disabled class="btn btn-success board"><span class="fas fa-door-open"></span></button>';
                    } else {
                        $output .= '<button type="button" disabled class="btn btn-secondary board"><span class="fas fa-door-closed"></span></button>'
                    }
                } else if ($cell == 'O'){
                    $output .= '<button type="button" disabled class="btn btn-danger board">&nbsp;</button>';
                } else if ($cell == 'C'){
                    $output .= '<button type="button" disabled class="btn btn-warning board">&nbsp;</button>';
                } else {
                    $output .= '<button type="button" disabled class="btn btn-light board">&nbsp;</button>';
                }
            }
        }
    }
}