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

                }
            }
        }
    }
}