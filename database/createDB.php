<?php 

require_once('../models/Manager.php');

$man = new Manager();
$pdo=$man->pdo;
$name = $_POST['name'];

try {
    $pdo->exec("CREATE DATABASE $name");
    echo "Database ". $name ." created successfully\n";
} catch (PDOException $e) {
    echo "Error creating database ". $name ." : ". $e->getMessage(). "\n";
}

?>