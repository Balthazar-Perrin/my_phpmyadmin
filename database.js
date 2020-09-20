  /***************************afficher toutes les db*************************/
  function showDB() {
    $.ajax({
      type: "GET",
      url: "./database/showDB.php",

      success: function (response) {
        $("#selectDB").empty();
        $.each(JSON.parse(response), function (i, db) {
          $("#selectDB").append("<option value='" + db + "'>" + db + "</option>");
        });
        showTables();
      },
      error: function () {
        console.log(response);
        $("#result").html(response);
      }
    });
  }

$(document).ready(function () {

  showDB();

  /***************************créer db*************************/
  $("#buttonCreateDB").click(function (e) {
    if ($("#inputCreateDB").val() == "") {
      return;
    }
    $.ajax({
      type: "POST",
      url: "./database/createDB.php",
      data: {
        name: $("#inputCreateDB").val()
      },
      dataType: "html",
      success: function (response) {
        console.log(response);
        $("#result").html(response);
        showDB();

      },
      error: function (response) {
        console.log(response);
        $("#result").html(response)
      }
    });
  });

  /***************************supprimer db*************************/
  $("#buttonDropDB").click(function (e) {
    $.ajax({
      type: "POST",
      url: "./database/dropDB.php",
      data: {
        name: $("#selectDB").val()
      },
      dataType: "html",
      success: function (response) {
        console.log(response);
        $("#result").html(response);
        showDB();

      },
      error: function (response) {
        console.log(response);
        $("#result").html(response);
      }
    });
  });

  /***************************renommer db*************************/

  $("#buttonRenameDB").click(function (e) {
    if ($("#inputRenameDBNew").val() == "") {
      return;
    }
    $.ajax({
      type: "POST",
      url: "./Database/renameDB.php",
      data: {
        DBnameOld: $("#selectDB").val(),
        DBnameNew: $("#inputRenameDBNew").val()
      },
      dataType: "html",
      success: function (response) {
        console.log(response);
        $("#result").html(response);
        showDB();
      },
      error: function () {
        $("#result").html(response);
      }
    });
  });


  /***************************afficher stats de db*************************/

  $("#buttonStatsDB").click(function (e) {
    if ($("#selectDB").val() == "") {
      return;
    }
    $.ajax({
      type: "GET",
      url: "./database/statsDB.php",
      data: {
        name: $("#selectDB").val()
      },
      dataType: "html",
      success: function (response) {
        console.log(response);
        var result = $.parseJSON(response);

        console.log(result);

        if ($("#buttonStatsDB").data("clicked")) {
          $("#responseStatsDB li").remove();
        }

        if (result[0] == '0' && result[2] == null) {
          $("#result").html("ERROR database " + name + " doesn't exist");
          return;
        }

        $("#responseStatsDB").append("<li>Nombre de tables : " + result[0] + "</li>");
        $("#responseStatsDB").append("<li>Date de création de la première table : " + result[1] + "</li>");
        $("#responseStatsDB").append("<li>Mémoire utilisée par la base de donnée : " + result[2] + "</li>");
        $("#buttonStatsDB").data('clicked', true);
        $("#result").html("");

      },
      error: function (response) {
        console.log(response);
        $("#result").html(response);
      }
    });

  });



});

