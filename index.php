<?php
require_once('./models/Manager.php');
require_once('./managerDB.php');

$man = new Manager();
$pdo=$man->pdo;

?>



<html>

<header>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./AJAX.js"></script>
    <link rel="stylesheet" href="style.css">
</header>

<body>



<input id="inputCreateDB" type=text>
<button id="buttonCreateDB" >créer db</button>
<br><br>
<input id="inputDropDB" type=text>
<button id="buttonDropDB" >supprimer db</button>
<br><br>
<input id="inputStatsDB" type=text>
<button id="buttonStatsDB" >afficher stats db</button>

<p id="test"></p>
<!--
<button onclick="getDatabases($pdo)">Créer une base de données</button>
<button onclick="getElementById('demo').innerHTML = getDatabases()">Afficher les bases de données</button>
 -->
</body>
</html>