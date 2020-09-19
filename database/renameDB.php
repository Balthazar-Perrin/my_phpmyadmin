<?php

require_once('../Models/Manager.php');
require_once('../managerDB.php');

$DBnameOld = $_POST['DBnameOld'];
$DBnameNew = $_POST['DBnameNew'];
$man = new Manager();
$pdo = $man->pdo;

try{

    $pdo->exec("CREATE DATABASE $DBnameNew");
    $array = [];
    $tables_data = fetchAllFromDB($pdo, "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE table_schema='$DBnameOld'", null);
 
 
    foreach($tables_data as $each) 
    {
       array_push($array, $each[0]);
    }
     
    foreach($array as $name) {
       $pdo->exec("CREATE TABLE IF NOT EXISTS $DBnameNew.$name LIKE $DBnameOld.$name");
       $pdo->exec("INSERT $DBnameNew.$name SELECT * FROM $DBnameOld.$name");
    }

    $pdo->exec("DROP DATABASE $DBnameOld");
    $pdo = null;
    echo "Renamed $DBnameOld to $DBnameNew";

} catch(PDOException $e){
    die("ERROR: Could not rename $DBnameOld to $DBnameNew: " . $e->getMessage());
}



?>