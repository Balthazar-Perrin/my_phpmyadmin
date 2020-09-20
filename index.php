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

    <br>

    <select id="selectDB" onchange=showTables()></select>
    <select id="selectTable" onchange=showColumns()></select>
    <select id="selectColumn" onchange=showColumns()></select>

    <div id="wrapper">
        <div id="databases" class="basicDiv">
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

        <div id="tables" class="basicDiv">
            <input id="inputRenameTable" type=text placeholder="nouveau nom de la table">
            <button id="buttonRenameTable">Renommer la table</button>
            <br>
            <input id="inputColumn" type=text placeholder="nom de la colonne">

            <select id="selectDataType" name="selectDataType">
                <option value=int>int</option>
                <option value=varchar>varchar</option>
                <option value=text>text</option>
                <option value=date>date</option>
                <!--<optgroup label="Numérique">
            </optgroup>
            <optgroup label="Date">
            </optgroup>
            <optgroup label="Chaîne de caractères">
            </optgroup>
            <optgroup label="Spatial">
            </optgroup>
            <optgroup label="JSON">
            <option value=JSON>JSON</option>
            </optgroup>-->
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
    </div>

    <table id="tableData">
        <tr id="trColumn">
        </tr>
    </table>



</body>

</html>