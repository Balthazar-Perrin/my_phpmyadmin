<?php

function fetchFromDB($pdo, $query) {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetch();
    return ($data);
}

function fetchAllFromDB($pdo, $query) {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return ($data);
}

function dropDB($name, $pdo) {
    try {
        $pdo->exec("DROP DATABASE $name");
        echo "Database ". $name ." dropped successfully";

    } catch (PDOException $e) {
        echo "Error dropping database ". $name ." : ". $e->getMessage()."\n";
    }
}

// function renameDB($oldName, $newName, $pdo) {
//     try {
//         $pdo->exec("ALTER DATABASE $oldName MODIFY NAME = $newName");
//         //$pdo->exec("ALTER DATABASE [test] MODIFY NAME = [nouveaunom]");

//         echo "Database ". $oldName ." renamed successfully as ". $newName . "\n";

//     } catch (PDOException $e) {
//         echo "Error renaming database ". $oldName ." as ". $newName. " : ". $e->getMessage()."\n";
//     }
// }

function statsDB($name) {
    try {
        //fetchFromDB($pdo, "USE $name; SELECT count(table_name) FROM INFORMATION_SCHEMA.TABLES");
        fetchAllFromDB($pdo, "USE test ; SHOW TABLES");
        echo "Database ". $name ." stats recovered successfully";

    } catch (PDOException $e) {
        echo "Error retrieveing stats from database ". $name ." : ". $e->getMessage()."\n";
    }
}


function getDatabases($pdo) {
    try {
        return(fetchAllFromDB($pdo, "SHOW DATABASES"));
    } catch (PDOException $e) {
        echo "Error getting the databases: ". $e->getMessage()."\n";
    }
}
?>