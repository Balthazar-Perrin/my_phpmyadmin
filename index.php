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

    <div id="resultDiv">
        <p id="result"></p>
    </div>

    <br><br>
    <div>
        <label for="selectDB">Bases de données :</label>
        <select id="selectDB" onchange=showTables()></select><br>
        <label for="selectTable">Tables :</label>
        <select id="selectTable" onchange=showColumns()></select>
    </div>


    <div id="databases" class="basicDiv">
        <h3>Actions sur base de données</h3>
        <input id="inputCreateDB" type=text placeholder="nom de la nouvelle DB">
        <button id="buttonCreateDB">créer DB</button>
        <br>
        <input id="inputRenameDBNew" type=text placeholder="nouveau nom">
        <button id="buttonRenameDB">renommer DB</button>
        <br> 
        <button id="buttonDropDB">supprimer DB</button>
        <button id="buttonStatsDB">afficher stats DB</button>
        <ul id="responseStatsDB"></ul>

    </div>

    <div id="tables" class="basicDiv">
        <h3>Actions sur tables et colonnes</h3>
        <input id="inputRenameTable" type=text placeholder="nouveau nom de la table">
        <button id="buttonRenameTable">Renommer la table</button>
        <br>
        <input id="inputColumn" type=text placeholder="nom de la colonne">

        <select id="selectDataType" name="selectDataType">
            <option value=int>int</option>
            <option value=varchar>varchar</option>
            <option value=text>text</option>
            <option value=date>date</option>
        </select>

        <button id="buttonAddColumn">Ajouter une colonne</button>
        <br>
        <button id="buttonDropColumn">Supprimer une colonne</button>
        <br>
        <input id="inputRenameColumn" type=text placeholder="nouveau nom de la colonne">
        <select id="SelectNewType" name="selectNewDataType">
            <option value=default>Ne pas changer le type de données</option>
            <option value=int>int</option>
            <option value=varchar>varchar</option>
            <option value=text>text</option>
            <option value=date>date</option>
        </select>
        <button id="buttonModifyColumn">Modifier colonne</button>
        <br>
        <button id="buttonStatsTable">afficher stats table</button>
        <ul id="responseStatsTable"></ul>


    </div>
    <div>
        <div id="data" class="basicDiv">
            <h3>Actions sur données</h3>
            <input id="inputData" type=text placeholder="données, entre guillemets et séparés par des virgules"><br>
            <input id="inputDataColumn" type=text placeholder="colonnes correspondantes, séparées par des virgules"><br>
            <button id="buttonAddData">Ajouter Donnée</button><br>
            <button id="buttonDeleteData">Supprimer Donnée</button>
        </div>

        <div id="modifyData" class="basicDiv">
            <h3>modifier une donnée</h3>
            <label for="inputWhereColumn">là où la colonne </label>
            <input class="modData" id="inputWhereColumn" type=text>
            <label for="inputWhereData">est égale à </label>
            <input class="modData" id="inputWhereData" type=text>
            <br>
            <label for="inputNewColumn">modifier la valeur de </label>
            <input class="modData" id="inputNewColumn" type=text>
            <label for="inputNewData">en </label>
            <input class="modData" id="inputNewData" type=text>
            <button id="buttonModifyData">Modifier donnée</button>

        </div>
    </div>



    <table id="tableData">
        <tr id="trColumn">
        </tr>
    </table>



</body>

</html>