<?php

require_once('../tools/Manager.php');
require_once('../tools/fetch.php');


$man = new Manager();
$pdo = $man->pdo;

$nameDB = $_GET["nameDB"];
$nameTable = $_GET["nameTable"];



try{

    $result_array = [];

    $result = fetchAllFromDB($pdo, "SELECT COUNT(*) FROM $nameDB.$nameTable");
    foreach($result as $each) {
       array_push($result_array, $each[0]);
    }

    $result = fetchAllFromDB($pdo, "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$nameDB' AND table_name = '$nameTable'");
    foreach($result as $each) {
       array_push($result_array, $each[0]);
    }

    $result = fetchAllFromDB($pdo, "SELECT create_time FROM information_schema.tables WHERE table_schema = '$nameDB'");
    foreach($result as $each) {
       array_push($result_array, $each[0]);
    }
    echo json_encode($result_array);

} catch(PDOException $e){
    die("ERROR: Could not get stats from DB $name. " . $e->getMessage());
}

?>