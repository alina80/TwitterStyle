<?php
require_once ROOT.'/includes/activeRecords/Comment.php';
if (isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}

$tweetsList = [];
$hasErrors = false;
$errors = [];
$message = '';

$postId = isset($_GET['tweetId']) && $_GET['tweetId'] > 0 ?
    $_GET['tweetId'] : null;

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $commentText = isset($_POST['commentText']) && strlen(trim($_POST['commentText'])) > 0 && strlen(trim($_POST['commentText'])) <= 60 ?
        $_POST['commentText'] : null;

    if (is_null($commentText)){
        $errors[] = 'comment can not be empty';
    }
    if (is_null($postId)){
        $errors[] = 'Tweet does not exist';
    }
    if (is_null($userId)){
        $errors[] = 'You must be logged in to comment';
    }
    if (!empty($errors)){
        $message = "Errors: " . implode(',',$errors);
        $hasErrors = true;
    }else{
        $comment = new Comment();
        $comment->setUserId($userId);
        $comment->setPostId($postId);
        $comment->setText($commentText);

        if ($comment->saveComment($conn)){
            header('Location:index.php');
            exit();
        }else{
            $message = 'Comment not saved ';
        }
    }



}