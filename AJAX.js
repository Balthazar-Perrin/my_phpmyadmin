$(document).ready(function() {

/***************************créer db*************************/
    $("#buttonCreateDB").click(function(e) {
      $.ajax({
        type: "POST",
        url: "./database/createDB.php",
        data:  {name: $("#inputCreateDB").val()},
        dataType: "html",
        success: function() {
          document.getElementById('test').innerHTML="okcreatedb";
        },
        error: function() {
          document.getElementById('test').innerHTML="errorcreatedb";
        }
      });
    }); 

/***************************supprimer db*************************/
  $("#buttonDropDB").click(function(e) {
    $.ajax({
      type: "POST",
      url: "./database/dropDB.php",
      data:  {name: $("#inputDropDB").val()},
      dataType: "html",
      success: function() {
        document.getElementById('test').innerHTML="okdropdb";
      },
      error: function() {
        document.getElementById('test').innerHTML="errordropdb";
      }
    });
  }); 

/***************************afficher stats de db*************************/

  $("#buttonStatsDB").click(function(e) {
    $.ajax({
      type: "GET",
      url: "./database/statsDB.php",
      data:  {name: $("#inputStatsDB").val()},
      dataType: "html",
      success: function(response) {
        document.getElementById('test').innerHTML=response;
      },
      error: function() {
        document.getElementById('test').innerHTML="errorstatsdb";
      }
    });
  }); 


});




