<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo = $man->pdo; 

try {
    $allDB = [];
    $array = fetchAllFromDB($pdo, "SHOW DATABASES");
    foreach ($array as $db) 
    {
        array_push($allDB, $db[0]);
    }
    echo json_encode($allDB);

} catch(PDOException $e) {
    die("ERROR: could not show all DB : ". $e->getMessage());
}

?>