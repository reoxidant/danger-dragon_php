<?php

function check($lang){
    if($lang == $_POST['language'] and $_POST['language'] != null){
        return 'checked';
    }else if($_POST['language'] == null and $_COOKIE['lang'] == $lang){
        return 'checked';
    }else{
        return '';
    }
}
