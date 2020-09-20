<?php

require_once('../tools/Manager.php');

$man = new Manager();
$pdo=$man->pdo;
$name = $_POST['name'];

try {
    $pdo->exec("DROP DATABASE $name");
    echo "Database $name dropped successfully";
} catch (PDOException $e) {
    die("ERROR dropping database $name: ". $e->getMessage());
}

?>