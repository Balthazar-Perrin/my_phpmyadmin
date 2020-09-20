<?php 

require_once('../tools/Manager.php');

$man = new Manager();
$pdo=$man->pdo;

$nameDB = $_POST["nameDB"];
$nameTable = $_POST["nameTable"];
$data = $_POST["data"];
$columns = $_POST["columns"];
try {
    $pdo->exec("INSERT INTO $nameDB.$nameTable ($columns) VALUES ($data)");
    echo "Data $data added successfully";
} catch (PDOException $e) {
    die("ERROR adding data $data to $nameDB.$nameTable : ". $e->getMessage());
}

?>