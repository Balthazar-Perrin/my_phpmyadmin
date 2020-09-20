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
            console.log(result);
            console.log(response);

            $("#trColumn th").remove();
            $.each(result, function (i, column) {
                $("#trColumn ").append("<th>" + column.COLUMN_NAME + "<br>[" + column.DATA_TYPE + "]</th>");
            });

            if (response == "[]") {
                $("#result").html("Table " + $("#selectTable").val() + " has no columns");
            } else {
                $("#result").html("");
                showData();
            }
        },

        error: function () {
            $("#trColumn th").remove();
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
                $("#result").html("DB " + $("#selectDB").val() + " has no table");
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
            url: "../tables/dropColumn.php",
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

    /*************************************  modifier colonne  ************************************** */

    $("#buttonModifyColumn").click(function (e) {
        if ($("#inputColumn").val() == "" || $("#selectTable").val() == null) {
            return;
        }
        $.ajax({
            type: "POST",
            url: "../tables/modifyColumn.php",
            data: {
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                nameColumn: $("#inputColumn").val(),
                newNameColumn: $("#inputRenameColumn").val(),
                newType: $("#SelectNewType").val()
            },
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#result").html(response);
                $("#inputColumn").val("");
                $("#inputRenameColumn").val("");
                showData();
            },
            error: function (response) {
                console.log(response);
                $("#result").html(response);
            }
        });
    });

  /*********************************  afficher stats de table  **********************************/

  $("#buttonStatsTable").click(function (e) {
    if ($("#selectTable").val() == null) {
      return;
    }
    $.ajax({
      type: "GET",
      url: "../tables/statsTable.php",
      data: {
        nameDB: $("#selectDB").val(),
        nameTable: $("#selectTable").val(),
      },
      dataType: "html",
      success: function (response) {
        console.log(response);

        var result = $.parseJSON(response);

        if ($("#buttonStatsTable").data("clicked")) {
          $("#responseStatsTable li").remove();
        }

        $("#responseStatsTable").append("<li>Nombre de lignes : " + result[0] + "</li>");
        $("#responseStatsTable").append("<li>Nombre de colonnes : " + result[1] + "</li>");
        $("#responseStatsTable").append("<li>Date de création : " + result[3] + "</li>");
        $("#buttonStatsTable").data('clicked', true);
        $("#result").html("");

      },
      error: function (response) {
        console.log(response);
        $("#result").html(response);
      }
    });

  });

});