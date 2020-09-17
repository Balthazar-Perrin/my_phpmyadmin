<?php 

class Manager {

public $pdo;

    function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
    
        try {
            $pdo = new PDO("mysql:host=$servername;", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connection successfull\n";
    
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
    
        $this->pdo=$pdo;
    }

    function close() {
        $this->pdo = null;
    }
}