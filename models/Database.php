<?php 

class Database {

    public $name;
    private $tables;
    public $pdo;

    function __construct($name, $tables, $pdo) {

        $this->name=$name;
        $this->tables=$tables;
        $this->$pdo=$pdo;

        try {
            $pdo->exec("CREATE DATABASE $name");
            echo "Database ". $name ." created successfully\n";
    
        } catch (PDOException $e) {
            echo "Error creating database ". $name ." : ". $e->getMessage(). "\n";
        }
    }


    
}


/*function fetchFromDB($pdo, $sql) {
    $stmt = $pdo->prepare($sql);
    $stmt-->execute();
    $data= $stmt->fetch();
    return ($data);
}

function fetchAllFromDB($pdo, $sql) {
    $stmt = $pdo->prepare($sql);
    $stmt-->execute();
    $data= $stmt->fetchAll();
    return ($data);
}*/
?>