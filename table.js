/***************************afficher toutes les tables d'une base de données*************************/
function showTables() {
    $.ajax({
        type: "GET",
        url: "./tables/showTables.php",
        data: {
            name: $("#selectDB").val()
        },
        dataType: "html",
        success: function (response) {

            result = JSON.parse(response);

            console.log(response);
            $("#selectTable option").remove();
            $.each(result, function (i, table) {
                $("#selectTable").append("<option value '" + table + "'>" + table + "</option>");
            });

            if (response == ['']) {
                $("#result").html("La DB " + $("#selectDB").val() + " n'a aucune table");
            } else {
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

    $("#buttonAddColumn").click(function (e) {
        if ($("#inputTable").val() == "" || $("#inputColumn").val() == "") {
            return;
        }
        $.ajax({
            type: "POST",
            url: "./tables/addColumn.php",
            data: {
                nameDB: $("#inputDB").val(),
                nameTable: $("#inputTable").val(),
                nameColumn: $("#inputColumn").val(),
                dataType: $("#dataType").val()
            },
            dataType: "html",
            success: function (response) {
                console.log(response);
                $("#result").html(response)
            },
            error: function (response) {
                console.log(response);
                $("#result").html(response)
            }
        });
    });

});