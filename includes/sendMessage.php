<?php

require_once ROOT.'/includes/activeRecords/Message.php';
require_once ROOT.'/includes/user.php';

$hasErrors = false;
$errors = [];
$message = '';

$senderId = $_SESSION['userId'];
$recipientId = isset($_GET['userToDisplay']) && $_GET['userToDisplay'] > 0 ?
    $_GET['userToDisplay'] : null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $messageText = isset($_POST['message']) && strlen(trim($_POST['message'])) > 0 && strlen(trim($_POST['message'])) <= 60 ?
        $_POST['message'] : null;

    if (is_null($senderId)){
        $errors[] = 'sender';
    }
    if (is_null($recipientId)){
        $errors[] = 'recipient';
    }
    if (is_null($messageText)){
        $errors[] = 'messageText';
    }

    if (empty($errors)){
        $mess = new Message();
        $mess->setSenderId($senderId);
        $mess->setRecipientId($recipientId);
        $mess->setMessageText($messageText);
        $mess->saveMessage($conn);


    }else{
        $hasErrors = true;
        $message = "Errors: " . implode(',',$errors);
    }
    $page = 'home';

}


