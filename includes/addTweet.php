<?php
require_once ROOT.'/includes/activeRecords/Tweet.php';
   $userId = $_SESSION['userId'];
   $tweetsList = [];
   if ($_SERVER['REQUEST_METHOD'] === 'POST'){
       $tweetText = isset($_POST['tweet']) && strlen(trim($_POST['tweet'])) > 0 && strlen(trim($_POST['tweet'])) < 60 ?
           $_POST['tweet'] : null;

       $tweet = new Tweet();
       $tweet->setUserId($userId);
       $tweet->setText($tweetText);

       if ($tweet->saveTweet($conn)){
           header('Location:index.php');
           exit();
       }else{
           echo 'Tweet not saved ';
       }
   }
   $page = 'home';