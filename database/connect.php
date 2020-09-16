<?php



function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$servername;", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection successfull\n";

    } catch (PDOException $e) {
        echo "Connection failed" . $e->getMessage();
    }

    return $pdo;
}

function connectWithDB($dbname) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO("mysql:host=$servername;dbnmame=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection to ".$dbname." successfull\n";

    } catch (PDOException $e) {
        echo "Connection to ".$dbname." failed" . $e->getMessage();
    }
}


function closeConn() {
    
}

?>