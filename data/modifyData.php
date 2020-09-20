<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo=$man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$dataWhere = $_POST["dataWhere"];
$columnWhere = $_POST["columnWhere"];
$dataNew = $_POST["dataNew"];
$columnNew= $_POST["columnNew"];


try {
    $pdo->exec("UPDATE $nameDB.$nameTable SET $columnNew='$dataNew' WHERE $columnWhere='$dataWhere'");
    echo "Where $columnWhere = $dataWhere, $columnNew modified successfully to $dataNew in $nameDB.$nameTable"; 
} catch (PDOException $e) {
    die("ERROR modifying $columnNew to $dataNew where $columnWhere = $dataWhere from $nameDB.$nameTable : ". $e->getMessage());
}

?>