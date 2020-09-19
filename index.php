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


<div>
<input type="button" id="buttonShowDB" value="Afficher DB">
<ul id="responseShowDB"></ul>
<input id="inputCreateDB" type=text>
<button id="buttonCreateDB" >créer DB</button>
<br>
<input id="inputDropDB" type=text>
<button id="buttonDropDB" >supprimer DB</button>
<br>
<input id="inputRenameDBOld" type=text placeholder="ancien nom">
<input id="inputRenameDBNew" type=text placeholder="nouveau nom">
<button id="buttonRenameDB" >renommer DB</button>
<br>
<input id="inputStatsDB" type=text>
<button id="buttonStatsDB" >afficher stats DB</button>
<ul id="responseStatsDB"></ul>
</div>

<p id="result"></p>
<!--
<button onclick="getDatabases($pdo)">Créer une base de données</button>
<button onclick="getElementById('demo').innerHTML = getDatabases()">Afficher les bases de données</button>
 -->
</body>
</html>