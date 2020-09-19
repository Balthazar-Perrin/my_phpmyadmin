$(document).ready(function () {


  /***************************afficher toutes les db*************************/
  $("#buttonShowDB").click(function (e) {
    $.ajax({
      type: "GET",
      url: "./database/showDB.php",

      success: function (response) {

        if ($("#buttonShowDB").data("clicked")) {
          $("#responseShowDB li").remove();
          //$("#buttonShowDB").html("Afficher DB");
          $("#buttonShowDB").val("Afficher DB");
          $("#buttonShowDB").data('clicked', false);
          return;
        }

        if (!$("#buttonShowDB").data("clicked")) {
          console.log(response);
          $.each(JSON.parse(response), function (i, db) {
            $("#responseShowDB").append("<li>" + db + "</li>");
          });
          //$("#buttonShowDB").html("Cacher DB");
          $("#buttonShowDB").val("Cacher DB");
          $("#buttonShowDB").data('clicked', true);

        }
        $("#result").html("");

      },
      error: function () {
        console.log(response);
        $("#result").html(response);
      }
    });
  });


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
        $("#result").html(response)
      },
      error: function (response) {
        console.log(response);
        $("#result").html(response)
      }
    });
  });

  /***************************supprimer db*************************/
  $("#buttonDropDB").click(function (e) {
    if ($("#inputDropDB").val() == "") {
      return;
    }
    $.ajax({
      type: "POST",
      url: "./database/dropDB.php",
      data: {
        name: $("#inputDropDB").val()
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

  /***************************renommer db*************************/

  $("#buttonRenameDB").click(function (e) {
    if ($("#inputRenameDBOld").val() == "" || $("#inputRenameDBNew").val() == "") {
      return;
    }
    $.ajax({
      type: "POST",
      url: "./Database/renameDB.php",
      data: {
        DBnameOld: $("#inputRenameDBOld").val(),
        DBnameNew: $("#inputRenameDBNew").val()
      },
      dataType: "html",
      success: function (response) {
        console.log(response);
        $("#result").html(response)
      },
      error: function () {
        $("#result").html(response)
      }
    });
  });


  /***************************afficher stats de db*************************/

  $("#buttonStatsDB").click(function (e) {
    if ($("#inputStatsDB").val() == "") {
      return;
    }
    $.ajax({
      type: "GET",
      url: "./database/statsDB.php",
      data: {
        name: $("#inputStatsDB").val()
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