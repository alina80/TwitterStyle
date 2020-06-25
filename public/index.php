<?php
session_start();

define('ROOT',dirname(__DIR__));
require_once ROOT.'/lib/conn.php';
$conn = connect();

$public = ['home','login','register'];
$private = ['profile','addTweet','removeTweet','comment','logout','profile','messages','user','message'];

$isLoggedIn = isset($_SESSION['userId']) ?
    $_SESSION['userId'] : false;
if ($isLoggedIn){
    $routes = array_merge($public,$private);
}else{
    $routes = $public;
}

if (!isset($_GET['page'])){
    $page = 'home';
}else {
    $page = $_GET['page'];
}
    $page = in_array($page, $routes) ?
        $page : '404';

    $action = ROOT."/includes/$page.php";

    if (is_file($action)){
        require_once $action;
    }

include ROOT.'/views/main.php';