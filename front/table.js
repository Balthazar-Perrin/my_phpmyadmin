/***************************afficher toutes les colonnes d'une table  *******************************/
function showColumns() {
    $.ajax({
        type: "GET",
        url: "../tables/getColumn.php",
        data: {
            nameDB: $("#selectDB").val(),
            nameTable: $("#selectTable").val()
        },
        dataType: "html",
        success: function (response) {

            result = JSON.parse(response);

            $("#trColumn th").remove();
            $.each(result, function (i, column) {
                $("#trColumn ").append("<th>" + column.COLUMN_NAME + "</th>");
            });

            if (response == "[]") {
                $("#result").html("La table " + $("#selectTable").val() + " n'a aucune colonne");
            } else {
                $("#result").html("");
                showData();
            }
        },

        error: function () {
            console.log(response);
            $("#result").html(response);
        }
    });


}



/***************************afficher toutes les tables d'une base de données*************************/
function showTables() {
    $.ajax({
        type: "GET",
        url: "../tables/showTables.php",
        data: {
            name: $("#selectDB").val()
        },
        dataType: "html",
        success: function (response) {

            result = JSON.parse(response);
            //console.log(response);

            $("#selectTable option").remove();
            $.each(result, function (i, table) {
                $("#selectTable").append("<option value ='" + table + "'>" + table + "</option>");
            });

            

            if (response == "[]") {
             $("#result").html("La DB " + $("#selectDB").val() + " n'a aucune table");
            } else {
                showColumns();
                $("#result").html("");
            }
        },

        error: function () {
            console.log(response);
            $("#result").html(response);
        }
    });
}

$(document).ready(function () {

    /**********************************  renommer table  *********************************** */
    $("#buttonRenameTable").click(function (e) {
        if ($("#inputRenameTable").val() == "" || $("#selectTable").val() == null) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "../tables/renameTable.php",
            data: {
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                newNameTable: $("#inputRenameTable").val(),
            },
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#result").html(response);
                $("#inputRenameTable").val("");
            },
            error: function (response) {
                console.log(response);
                $("#result").html(response);
            }
        });
    });

    /**********************************  ajouter colonne  *********************************** */

    $("#buttonAddColumn").click(function (e) {
        if ($("#inputColumn").val() == "" || $("#selectTable").val() == null) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "../tables/addColumn.php",
            data: {
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                nameColumn: $("#inputColumn").val(),
                dataType: $("#selectDataType").val()
            },
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#result").html(response);
                $("#inputColumn").val("");
            },
            error: function (response) {
                console.log(response);
                $("#result").html(reponse);
            }
        });
    });

        /**********************************  supprimer colonne  *********************************** */

    $("#buttonDropColumn").click(function (e) {
        if ($("#inputColumn").val() == "" || $("#selectTable").val() == null) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "../tables/DropColumn.php",
            data: {
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                nameColumn: $("#inputColumn").val(),
            },
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#result").html(response);
                $("#inputColumn").val("");
            },
            error: function (response) {
                console.log(response);
                $("#result").html(reponse);
            }
        });
    });

    

});