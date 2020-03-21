<?php

setcookie('lang', $_POST['language'] == null ? $_COOKIE['lang'] : $_POST['language'], time()+3600, '/');

$post = $_POST['language'];
$language = null;

function changeLang($post, $cookie = 'en'){
    return ($post == null) ? $cookie : $post;
}

$language = $_COOKIE['lang'] == null ? changeLang($post) : changeLang($post, $_COOKIE['lang']);

require_once("{$language}/lang.php");
