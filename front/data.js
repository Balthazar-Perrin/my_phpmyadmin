/***************************afficher toutes les données d'une table  *******************************/
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
            console.log(response);
            result = JSON.parse(response);
            console.log(result);
            $(".tableData").remove();

            $.each(result, function (i, line) {
                if (i > 50) {
                    $("#result").html("Too many data in "+$("#selectDB").val()+"."+$("#selectTable").val()+", only 50 firsts prompted");
                    return;
                }
                $("#tableData").append("<tr class='lineData' id='line"+i+"'>");

                $.each(line, function (j, data) {
                    if ($.isNumeric(j)) {
                        $("#line"+i+"").append("<th>" + data + "</th>");
                        j++;
                    }
                });

                $("#trColumn ").append("</tr>");
                i++;
            });

            if (response == "[]") {
                $("#result").html("La table " +$("#selectDB").val()+"."+$("#selectTable").val()+" n'a aucune donnée");
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