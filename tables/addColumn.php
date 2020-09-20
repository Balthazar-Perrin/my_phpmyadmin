<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo = $man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$nameColumn = $_POST["nameColumn"];
$dataType = $_POST["dataType"];


try {
    $pdo->exec("ALTER TABLE $nameDB.$nameTable ADD COLUMN $nameColumn $dataType");
    echo "Added column $nameColumn of type $dataType to $nameDB.$nameTable successfully";
} catch(PDOException $e) {
    die("ERROR could not add column $nameColumn of type $dataType to table $nameDB.$nameTable : " . $e->getMessage());
}

?>