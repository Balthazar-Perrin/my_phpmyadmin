<html>

<header>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./front/data.js"></script>
    <script type="text/javascript" src="./front/table.js"></script>
    <script type="text/javascript" src="./front/database.js"></script>
    <link rel="stylesheet" href="./front/style.css">
</header>

<body>

    <p id="result"></p>

    <select id="selectDB" onchange=showTables()></select>

    <select id="selectTable" onchange=showColumns()></select>


    <div id="databases">

        <input id="inputCreateDB" type=text placeholder="nom de la nouvelle DB">
        <button id="buttonCreateDB">créer DB</button>
        <br>
        <button id="buttonDropDB">supprimer DB</button>
        <br>
        <input id="inputRenameDBNew" type=text placeholder="nouveau nom">
        <button id="buttonRenameDB">renommer DB</button>
        <br>
        <button id="buttonStatsDB">afficher stats DB</button>
        <ul id="responseStatsDB"></ul>

    </div>

    <div id="tables">

        <br>
        <input id="inputRenameTable" type=text placeholder="nouveau nom de la table">
        <button id="buttonRenameTable">Renommer la table</button>
        <br>
        <input id="inputColumn" type=text placeholder="nom de la colonne">
        <br>
        <select id="selectDataType" name="selectDataType">
            <option value=int>INT</option>
        </select>
        <br>

        <button id="buttonAddColumn">Ajouter une colonne</button>
        <br>
        <button id="buttonDropColumn">Supprimer une colonne</button>

        <br>


    </div>


    <table id="tableData">
        <tr id="trColumn">
        </tr>
    </table>



</body>

</html>