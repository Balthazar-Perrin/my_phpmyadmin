<?php 

require_once('../tools/Manager.php');

$man = new Manager();
$pdo=$man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$data = $_POST["data"];
$columns = $_POST["columns"];

try {
    $pdo->exec("DELETE FROM $nameDB.$nameTable WHERE $columns=$data");
    echo "Data $data and all its row deleted successfully from $nameDB.$nameTable"; 
} catch (PDOException $e) {
    die("ERROR deleting $data from $nameDB.$nameTable : ". $e->getMessage());
}

?>