<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo=$man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$nameColumn = $_POST["nameColumn"];


try {
    $pdo->exec("ALTER TABLE $nameDB.$nameTable DROP COLUMN $nameColumn;");
    echo "Column $nameColumn from $nameDB.$nameTable removed successfully";
} catch (PDOException $e) {
    die("ERROR removing column $nameColumn from $nameDB.$nameTable : ". $e->getMessage());
}

?>