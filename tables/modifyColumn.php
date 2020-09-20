<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo = $man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$nameColumn = $_POST["nameColumn"];
$newNameColumn = $_POST["newNameColumn"];
$newType = $_POST["newType"];

try {
    if ($newNameColumn == null) {
        $pdo->exec("ALTER TABLE $nameDB.$nameTable CHANGE COLUMN $nameColumn $nameColumn $newType");
        echo("Data type of $nameColumn from $nameDB.$nameTable successfully changed to $newType");
    } else if ($newType == "default") {
        $pdo->exec("ALTER TABLE $nameDB.$nameTable CHANGE COLUMN $nameColumn $newNameColumn");
        echo("Column $nameColumn from $nameDB.$nameTable successfully renamed to $newNameColumn");
    } else {
        $pdo->exec("ALTER TABLE $nameDB.$nameTable CHANGE COLUMN $nameColumn $newNameColumn $newType");
        echo("Column $nameColumn from $nameDB.$nameTable successfully changed to $newNameColumn with $newType");
    }
} catch (PDOException $e) {
    die("ERROR modifying column $nameColumn from $nameDB.$nameTable into $newNameColumn with $newType : ". $e->getMessage());
}


?>