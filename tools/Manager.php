<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'./tools/fetch.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'models/Database.php');

class Manager {

public $pdo;
public $allDB = [];

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
        $this->listDB();

    }

    function listDB() {
        $array = fetchAllFromDB($this->pdo, "SHOW DATABASES");

        foreach ($array as $db) {
        //$database = new Database($db[0], $db);
        array_push($this->allDB, $db);
        }
        
        return $this->allDB;

    }


    function close() {
        $this->pdo = null;
    }
}