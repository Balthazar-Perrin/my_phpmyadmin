<?php

require_once('../tools/Manager.php');
require_once('../tools/fetch.php');


$man = new Manager();
$pdo = $man->pdo; 
$name = $_GET["name"];

try {
    $tables = [];
    $array = fetchAllFromDB($pdo, "SELECT table_name FROM information_schema.tables WHERE table_schema='$name'");
    foreach ($array as $table) 
    {
        array_push($tables, $table[0]);
    }
    echo json_encode($tables);

} catch (PDOException $e) {
    echo "ERROR retrieving tables from database $name : " . $e->getMessage();
}


?>