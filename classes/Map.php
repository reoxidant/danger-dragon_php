<?php

namespace classes;

class Map{
    private $playerIsAlive;

    public function _construct($boolIsAlive){
        $this->playerIsAlive = $boolIsAlive;
    }

    private function render(){
        $OUTPUT = file_get_contents('templates/header.html');
        if($this->playerIsAlive){
            $this->renderInterface();
        }
        $OUTPUT = file_get_contents('templates/footer.html');
    }

    private function renderInterface(){
        $output = "
            <form method='post'>
                <button value='up'>{$string['buttonUp']}</button>
                <button value='left'>{$string['buttonLeft']}</button>
                <button value='right'>{$string['buttonRight']}</button>
                <button value='down'>{$string['buttonDown']}</button>          
            </form>
        ";
    }
}