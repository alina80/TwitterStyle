<?php
require_once ROOT.'/includes/activeRecords/Message.php';
require_once ROOT.'/includes/activeRecords/User.php';

$messageId = isset($_GET['message']) && $_GET['message'] > 0 ?
    $_GET['message'] : null;
$read = isset($_GET['read']) && $_GET['read']==='yes' ?
    $_GET['read'] : 'no';
$selectedMessage = Message::getMessageById($conn, $messageId);
$date = $selectedMessage->getCreationDate();
$text = $selectedMessage->getMessageText();
$senderId = $selectedMessage->getSenderId();
$sender = User::getById($conn,$senderId)->getName();

if ($selectedMessage->getRecipientId() == $_SESSION['userId']){
    $readMes = new Message();
    $readMes->setId($messageId);
    $readMes->setSenderId($senderId);
    $readMes->setRecipientId($_SESSION['userId']);
    $readMes->setMessageText($text);
    $readMes->setIsRead(1);
    $readMes->setCreationDate($date);
    $readMes->saveMessage($conn);

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['action']) && $_POST['action'] === 'delete'){
            Message::deleteMessage($conn,$messageId);
            header('Location:index.php?page=messages');
            exit();
        }
        if (isset($_POST['action']) && $_POST['action'] === 'back'){
            header('Location:index.php?page=messages');
            exit();
        }
    }
}



