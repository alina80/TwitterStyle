<?php
require_once ROOT.'/config/db.php';

function connect()
{
    $host = HOST;
    $user = USER;
    $password = PASS;
    $db = DB;
    $pass = true;
    $conn = null;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    } catch (Exception $e) {
        $pass = false;
        echo $e->getMessage();
    }

    if($pass) {
        return $conn;
    }

    return null;
}
?>