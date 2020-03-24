<?php

function check($lang, $defaultLanguage)
{
    if ($lang == $_POST['language'] and $_POST['language'] != null) {
        return 'checked';
    } else if ($_POST['language'] == null and $_COOKIE['lang'] == $lang) {
        return 'checked';
    } else if ($_POST['language'] == null and $_COOKIE['lang'] == null and $lang == $defaultLanguage) {
        return 'checked';
    } else {
        return '';
    }
}

function checkErrors($ERRORS)
{
    foreach ($ERRORS as $key => $arr) {
        if ($arr != null) {
            foreach ($arr as $value) {
                if ($value != null or $value != '') {
                    echo $value . '<br>';
                } else {
                    return null;
                }
            }
        }
    }
}