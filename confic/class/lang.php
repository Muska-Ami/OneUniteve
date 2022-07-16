<?php
function getLang(): string
{
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4);

    if ($_COOKIE['OU_LANG'] != null) {
        $lang = $_COOKIE['OU_LANG'];
    } else {
        if (preg_match("/zh-c/i", $lang)) {
            $lang = "zh-cn";
        } else if (preg_match("/zh/i", $lang)) {
            $lang = "zh";
        } else if (preg_match("/en/i", $lang)) {
            $lang = "en";
        } else {
            $lang = "en";
        }
    }
    return $lang;
}