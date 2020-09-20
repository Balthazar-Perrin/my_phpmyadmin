<?php

require_once('../Models/Manager.php');
require_once('../managerDB.php');

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$nameColumn = $_POST["nameColumn"];
$dataType = $_POST["dataType"];
$man = new Manager();
$pdo = $man->pdo;

try {
    $pdo->exec("ALTER TABLE $nameDB.$nameTable ADD $nameColumn $dataType");
    echo "Added column $nameColumn of type $dataType to $nameDB.$nameTable successfully";
} catch(PDOException $e) {
    die("ERROR could not add column $nameColumn to table $nameTable of DB $nameDB : " . $e->getMessage());
}

?>