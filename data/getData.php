<?php

require_once('../tools/Manager.php');
require_once('../tools/fetch.php');

$man = new Manager();
$pdo = $man->pdo;

$nameDB = $_GET["nameDB"];
$nameTable = $_GET["nameTable"];

try {
    $lines = [];
    $array = fetchAllFromDB($pdo, "SELECT * FROM $nameDB.$nameTable");
    foreach ($array as $line) 
    {
        array_push($lines, $line);
    }
    echo json_encode($lines);

} catch (PDOException $e) {
    echo "ERROR retrieving tables from database $nameDB : " . $e->getMessage();
}

?>