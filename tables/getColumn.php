<?php

require_once('../tools/Manager.php');
require_once('../tools/fetch.php');

$man = new Manager();
$pdo = $man->pdo;

$nameDB = $_GET["nameDB"];
$nameTable = $_GET["nameTable"];

try {
    $columns = [];
    // $array = fetchAllFromDB($pdo, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE (TABLE_NAME = '$nameTable')
    //                                AND TABLE_SCHEMA='$nameDB' ORDER BY ORDINAL_POSITION");

    $array = fetchAllFromDB($pdo, "SELECT COLUMN_NAME,DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE (TABLE_NAME = '$nameTable')
                                   AND TABLE_SCHEMA='$nameDB' ORDER BY ORDINAL_POSITION");
    foreach ($array as $column) 
    {
        array_push($columns, $column);
    }
    echo json_encode($columns);

} catch (PDOException $e) {
    die("ERROR retrieving tables from database $nameDB : " . $e->getMessage());
}

?>