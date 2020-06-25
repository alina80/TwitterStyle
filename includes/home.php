<?php
require_once ROOT.'/includes/activeRecords/Tweet.php';
require_once ROOT.'/includes/activeRecords/User.php';
require_once ROOT.'/includes/activeRecords/Comment.php';
require_once ROOT . '/includes/comment.php';

$message = "";
$tweetsList = Tweet::loadAllTweets($conn);
$nrOfTweets = count($tweetsList);  //total items in array
$perPage = 6;  //per page

$pageNr = ! empty( $_GET['pageNr'] ) ? (int) $_GET['pageNr'] : 1;

$totalPages = ceil( $nrOfTweets / $perPage ); //calculate total pages

$pageNr = isset($_GET['pageNr']) && is_numeric($_GET['pageNr']) && $_GET['pageNr'] > 0 ?
    $_GET['pageNr'] : max($pageNr, 1);  //get 1 page when $_GET['page'] <= 0
$pageNr = isset($_GET['pageNr']) && is_numeric($_GET['pageNr']) && $_GET['pageNr'] <= $totalPages ?
    $_GET['pageNr'] : min($pageNr, 1);  //get last page when $_GET['page'] > $totalPages

$offset = ($pageNr - 1) * $perPage;
if( $offset < 0 ) {
    $offset = 0;
}

$tweetsList = array_slice( $tweetsList, $offset, $perPage );
$nrOfCommentsPerTweet = [];
foreach ($tweetsList as $k=>$v) {
    $nrOfCommentsPerTweet[$v['tweetId']] = Comment::nrOfCommentsPerTweet($conn, $v['tweetId']);
}

$page = 'home';