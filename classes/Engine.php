<?php

namespace app\classes;

class Engine
{
    private $output;
    private $number_level_map;
    private $errors = [];

    public function show_error()
    {
        return $this->errors;
    }

    private function renderInterface($map)
    {
        $this->output .= '<div class="main-interface">';

        $this->output .= $map;

        $this->output .= '</div>';
    }

    private function renderPage($elementsMap)
    {
        $this->output = file_get_contents('./templates/header.php');

        $this->renderInterface($elementsMap);

        $this->output .= file_get_contents('./templates/footer.php');

        return $this->output;
    }

    public function run()
    {
        global $OUTPUT;

        $map = new Map();
        $map->loadLevelOnTheMap($this->number_level_map);

        $elementsMap = $map->renderMap();

        $OUTPUT = $this->renderPage($elementsMap);
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