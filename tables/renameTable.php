<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo = $man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$newNameTable = $_POST["newNameTable"];

try {
    $pdo->exec("ALTER TABLE $nameDB.$nameTable RENAME TO $nameDB.$newNameTable");
    echo("table $nameDB.$nameTable successfully renamed to $newNameTable");
} catch (PDOException $e) {
    die("ERROR renaming table $nameDB.$nameTable into $newNameTable : ". $e->getMessage());
}


?>