<?php

require_once ROOT.'/includes/activeRecords/Message.php';
require_once ROOT.'/includes/activeRecords/User.php';

$receivedMessages = Message::getAllMessagesByReceiverId($conn,$_SESSION['userId']);
$sentMessages = Message::getAllMessagesBySenderId($conn,$_SESSION['userId']);
