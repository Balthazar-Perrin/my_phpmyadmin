<?php

require_once('./models/Database.php');
require_once('./models/Table.php');
require_once('./database/connect.php');
require_once('./database/managerDB.php');


$pdo = connect();
$db_name= "tesst";

$databases=getDatabases($pdo);
$database = new Database($db_name, [], $pdo);
//statsDB("test", $pdo);
//renameDB("test", "nouveaunom", $pdo);
//dropDB("tesst", $pdo);



/*
$array = fetchAllFromDB($pdo, "SHOW DATABASES");

foreach ($array as $db) {
    $database = new Databases($db[0])
    array_push($databases_list, $database);
    var_dup($db);
}

print_r($databases_list);
*/

?>

<html>
<header>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</header>

<body>
<?php
foreach($databases as $db)
{
    print_r($db[0]);
    echo("<br>");
}
?>
</body>
</html>