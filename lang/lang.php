<?php

namespace lang;

$defaultLanguage = 'en';
$post = $_POST['lang'];

function changeLang($defaultLanguage, $post){
    $language = isset($post) ? $defaultLanguage : $post;
    if($language){
        var_dump("{$language}/lang.php");
        require_once("{$language}/lang.php");
    }
}

changeLang($defaultLanguage, $post);
