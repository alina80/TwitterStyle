<?php
class Conn2{
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'coderslab';
    private $db = 'twitterStyle';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->pass);
    }

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new conn2();
        }
        return self::$instance;
    }

    public  function getConnection(){
        return $this->conn;
    }
}
?>