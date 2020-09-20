<?php 

require_once('../tools/Manager.php');

$man = new Manager();
$pdo=$man->pdo;
$name = $_POST['name'];

try {
    $pdo->exec("CREATE DATABASE $name");
    echo "Database $name created successfully";
} catch (PDOException $e) {
    die("ERROR creating database $name : ". $e->getMessage());
}

?>