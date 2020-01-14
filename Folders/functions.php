<?php

function asset($asset) {
    return DOMAIN . $asset;
}

function url($page = 'home') {
    $url = DOMAIN . "?p={$page}";
    return $url;
}

function dd($varibale) {
    dump($varibale);
    die("END");
}