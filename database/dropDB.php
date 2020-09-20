<?php

require_once('../models/Manager.php');

$man = new Manager();
$pdo=$man->pdo;
$name = $_POST['name'];

try {
    $pdo->exec("DROP DATABASE $name");
    echo "Database ". $name ." dropped successfully";
} catch (PDOException $e) {
    die("ERROR dropping database $name: ". $e->getMessage());
}

?>