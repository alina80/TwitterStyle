<?php
session_start();
define('ROOT',dirname(__DIR__));
require_once ROOT.'/lib/conn.php';
$conn = connect();

$public = ['home','login','register'];
$private = ['profile','addTweet','removeTweet','comment'];

if (!isset($_GET['page'])){
    $page = 'home';
}else {
    $page = in_array($_GET['page'], $public) ?
        $_GET['page'] : '404';

    $action = ROOT."/includes/$page.php";

    if (is_file($action)){
        require_once $action;
    }
}
include ROOT.'/views/main.php';