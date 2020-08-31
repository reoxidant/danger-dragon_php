<?php
/**
 * Description actions
 * @copyright 2020 vshapovalov
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package PhpStorm
 */

namespace app\classes;


class InterfaceApp
{
    /**
     * @var
     */
    private $output;
    /**
     * @var int
     */
    private $number_level_map = 1;

    /**
     * @return string
     */
    private function renderFormInterface()
    {
        return '
            <div class="nav-state">
                <div class="nav-status">
                    <p>Level Game is  '."$this->number_level_map".'</p>
                    <button class="btn btn-danger" value=\'document.cookie ="php_game_level_number=1; expires = Thu, 01 Jan 1970 00:00:00 GMT"\'>Reset Game</button>
                </div>        
                <div class="nav-bar">
                     <form method="POST" action="index.php" >
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

    /**
     * @param $map
     */
    private function renderInterface($map)
    {
        $this->output .= '<div class="main-interface">';

        $this->output .= $this->renderFormInterface();

        $this->output .= $map;

        $this->output .= '</div>';
    }
    /**
     * @param $htmlMap
     * @return string
     */
    public function renderPage($htmlMap)
    {
        $this->output = file_get_contents('./templates/header.php');

        $this->renderInterface($htmlMap);

        $this->output .= file_get_contents('./templates/footer.php');

        return $this->output;
    }

}