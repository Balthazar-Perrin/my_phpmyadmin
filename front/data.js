/********************************  afficher toutes les données d'une table  *******************************/
function showData() {
    $.ajax({
        type: "GET",
        url: "../data/getData.php",
        data: {
            nameDB: $("#selectDB").val(),
            nameTable: $("#selectTable").val()
        },
        dataType: "html",
        success: function (response) {
            result = JSON.parse(response);
            //console.log(result);
            $(".lineData").remove();

            $.each(result, function (i, line) {
                if (i > 50) {
                    $("#result").html("Too many data in " + $("#selectDB").val() + "." + $("#selectTable").val() + ", 50 firsts only are prompted");
                    return;
                }
                $("#tableData").append("<tr class='lineData' id='line" + i + "'>");

                $.each(line, function (j, data) {
                    if ($.isNumeric(j)) {
                        $("#line" + i + "").append("<th>" + data + "</th>");
                        j++;
                    }
                });

                $("#trColumn ").append("</tr>");
                i++;
            });

            if (response == "[]") {
                $("#result").html("Table " + $("#selectDB").val() + "." + $("#selectTable").val() + " has no data");
            } else {
                //$("#result").html("");
            }
        },

        error: function () {
            console.log(response);
            $("#result").html(response);
        }
    });
}

$(document).ready(function () {

    /************************************  ajouter donnée  *************************************/
    $("#buttonAddData").click(function (e) {
        if ($("#inputData").val() == "") {
            return;
        }
        $.ajax({
            type: "POST",
            url: "../data/addData.php",
            data: {
                data: $("#inputData").val(),
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                columns: $("#inputDataColumn").val()
            },
            dataType: "html",
            success: function (response) {
                $("#result").html(response);
                showData();

            },
            error: function (response) {
                console.log(response);
                $("#result").html(response);
            }
        });
    });


    /************************************  supprimer donnée  *************************************/
    $("#buttonDeleteData").click(function (e) {
        if ($("#inputData").val() == "") {
            return;
        }
        $.ajax({
            type: "POST",
            url: "../data/deleteData.php",
            data: {
                data: $("#inputData").val(),
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                columns: $("#inputDataColumn").val(),
            },
            dataType: "html",
            success: function (response) {
                $("#result").html(response);
                showData();
            },
            error: function (response) {
                console.log(response);
                $("#result").html(response);
            }
        });
    });

    /************************************  modifier donnée  *************************************/
    $("#buttonModifyData").click(function (e) {
         if ($(".modData").val() == "") {
             return;
         }
        $.ajax({
            type: "POST",
            url: "../data/modifyData.php",
            data: {
                nameDB: $("#selectDB").val(),
                nameTable: $("#selectTable").val(),
                dataWhere: $("#inputWhereData").val(),
                columnWhere: $("#inputWhereColumn").val(),
                dataNew: $("#inputNewData").val(),
                columnNew: $("#inputNewColumn").val()
            },
            dataType: "html",
            success: function (response) {
                $("#result").html(response);
                showData();
            },
            error: function (response) {
                console.log(response);
                $("#result").html(response);
            }
        });
    });

});