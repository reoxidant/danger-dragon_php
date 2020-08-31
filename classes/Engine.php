<?php

namespace app\classes;

class Engine
{
    private $output;
    private $number_level_map = 1;
    private $errors = [];

    public function show_error()
    {
        return $this->errors;
    }

    private function renderInterface($map)
    {
        $this->output .= '<div class="main-interface">';

        $this->output .= $this->renderFormInterface();

        $this->output .= $map;

        $this->output .= '</div>';
    }

    private function renderFormInterface()
    {
        return '
            <div class="nav-state">
                <div class="nav-status">
                    <p>Level Game is  '."$this->number_level_map".'</p>
                    <button class="btn btn-danger" value=\'document.cookie ="php_game_level_number=1; expires = Thu, 01 Jan 1970 00:00:00 GMT"\'>Reset Game</button>
                </div>        
                <div class="nav-bar">
                     <form method="POST" >
                        <div class="nav-bar-top">
                            <button type="button" class="btn btn-primary">Move Up</button>
                        </div>
                        <div class="nav-bar-center">
                            <button type="button" class="btn btn-primary">Move Left</button>
                            <button type="button" class="btn btn-primary">Move Right</button>
                        </div>
                        <div class="nav-bar-center">
                             <button type="button" class="btn btn-primary">Move Down</button>
                        </div>          
                    </form>
                </div>    
            </div>
        ';
    }

    private function renderPage($htmlMap)
    {
        $this->output = file_get_contents('./templates/header.php');

        $this->renderInterface($htmlMap);

        $this->output .= file_get_contents('./templates/footer.php');

        return $this->output;
    }

    public function run()
    {
        global $OUTPUT;

        $map = new Map();
        $map->loadLevelOnTheMap();
        $map->renderMap();

        $htmlMap = $map->getGridOfMap();

        $OUTPUT = $this->renderPage($htmlMap);
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