<?php
session_start();
define('ROOT',dirname(__DIR__));

$public = ['home','login','register'];
$private = ['profile','addTweet','removeTweet','comment'];

if (!isset($_GET['page'])){
    $page = 'home';
}else {
    $page = in_array($_GET['page'], $public) ?
        $_GET['page'] : '404';
}
include ROOT.'/views/main.php';