<?php

function truncateString($string, $numberOfCharacters)
{
    return (mb_strlen($string) > $numberOfCharacters) ? mb_substr($string, 0, $numberOfCharacters, "utf-8") . '...' : $string;
}

function translate($item, $key) {
    if(gettype($item) === 'object') {
       $item = json_decode(json_encode($item), true);
    }

    return (app()->getLocale() !== 'ru' && !empty($item[$key . '_' . app()->getLocale()]) )
        ? $item[$key . '_' . app()->getLocale()]
        : $item[$key];
}
