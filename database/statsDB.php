<?php

require_once('../models/Manager.php');
require_once('../ManagerDB.php');

$man = new Manager();
$pdo=$man->pdo;
$name = $_GET['name'];

try {
    $numberTables = fetchAllFromDB($pdo, "SELECT count(table_name) FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$name'");
    //$creationDate = fetchAllFromDB($pdo, "EXEC sp_helpdb '$name'");
    //$creationDate = fetchAllFromDB($pdo, "SELECT create_date FROM sys.databases WHERE name = $name");
    //fetchFromDB($pdo, "USE $name SELECT count(table_name) FROM information_schema.TABLES", null);
    //fetchAllFromDB($pdo, "USE test ; SHOW TABLES");
    //echo "Database \"". $name ."\" stats recovered successfully";
    print_r($numberTables);
    //print_r($creationDate);
    return $numberTables;

} catch (PDOException $e) {
    echo "Error retrieveing stats from database ". $name ." : ". $e->getMessage()."\n";
}

?>