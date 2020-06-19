<?php
require_once (ROOT."/includes/activeRecords/Tweet.php");
require_once ROOT.'/includes/activeRecords/User.php';

$hasErrors = false;
$message = '';
if (isset($_SESSION['userId'])){
    $userToDisplay = isset($_GET['userToDisplay']) && $_GET['userToDisplay'] > 0 ?
        $_GET['userToDisplay'] : null;
    $userTweets = Tweet::loadAllTweetsByUserId($conn,$userToDisplay);
    $userToDisplayName = User::getById($conn,$userToDisplay)->getName();
}else{
    $hasErrors = true;
    $message = 'You must login to access this page';
}


