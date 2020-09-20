<?php

require_once('../tools/Manager.php');
require_once('../tools/fetch.php');


$man = new Manager();
$pdo = $man->pdo;
$name = $_GET['name'];

try{

    $result_array = [];

    $result = fetchAllFromDB($pdo, "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '$name'");
    foreach($result as $each) 
    {
       array_push($result_array, $each[0]);
    }
    $result = fetchAllFromDB($pdo, "SELECT table_schema, MIN(create_time) AS Creation_Time FROM information_schema.tables WHERE table_schema = '$name'");
    foreach($result as $each) 
    {
       array_push($result_array, $each[1]);
    }
      $result = fetchAllFromDB($pdo, "SELECT SUM(data_length + index_length) / 1024 / 1024 FROM information_schema.tables WHERE table_schema = '$name'");
    foreach($result as $each) 
    {
       array_push($result_array, $each[0]);
    }
    echo json_encode($result_array);

} catch(PDOException $e){
    die("ERROR: Could not get stats from DB $name. " . $e->getMessage());
}

?>