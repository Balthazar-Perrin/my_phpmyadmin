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
    <script type="text/javascript" src="./table.js"></script>
    <script type="text/javascript" src="./database.js"></script>
    <link rel="stylesheet" href="style.css">
</header>

<body>

<p id="result"></p>
<select id="selectDB" onchange=showTables()>
</select>
<select id="selectTable">
</select>
<div id="databases">


<input id="inputCreateDB" type=text placeholder="nom de la nouvelle DB">
<button id="buttonCreateDB" >créer DB</button>
<br>
<button id="buttonDropDB" >supprimer DB</button>
<br>
<input id="inputRenameDBNew" type=text placeholder="nouveau nom">
<button id="buttonRenameDB" >renommer DB</button>
<br>
<button id="buttonStatsDB" >afficher stats DB</button>
<ul id="responseStatsDB"></ul>

</div>

<div id="tables">

<br>
<input id="inputTable" type=text placeholder="nom de la table">
<br>
<input id="inputColumn" type=text placeholder="nom de la colonne">
<br>
<select id="dataType" name="dataType">
    <option value=int>int</option>
</select>
<br>

<button id="buttonAddColumn">Ajouter une colonne</button>
<ul id="responseShowTables"></ul>
<br>


</div>





<!--
<button onclick="getDatabases($pdo)">Créer une base de données</button>
<button onclick="getElementById('demo').innerHTML = getDatabases()">Afficher les bases de données</button>
 -->
</body>
</html>