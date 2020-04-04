<?php

class Engine
{
    private $output;
    private $number_level_map;

    private $errors = [];

    public function show_error()
    {
        return $this->errors;
    }

    private function renderInterface($output)
    {
        $output = '<div class="main-interface">';
        
        $output .= '</div>';
    }

    public function renderPage()
    {
        $this->output = file_get_contents('templates/header.html');

        $this->output .= $this->renderInterface($this->output);

        $this->output .= file_get_contents('templates/footer.html');

        return $this->output;
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