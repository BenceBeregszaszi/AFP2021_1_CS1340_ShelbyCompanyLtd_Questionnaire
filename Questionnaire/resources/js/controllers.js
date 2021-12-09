const { random } = require("lodash");

$(document).ready(function(){
  
  //Kérdőívek illetve kérdések szövegének módosítására szolgáló megjelenítés
  $("#changerButton").click(function(){
    $("#cim").hide();
    $("#cimChanger").show();
  })
    
  //Az egyes kérdőívek kitöltéséhez szükséges link másolása a vágólapra
  $(".copyBtn").click(function(){
    var link = $(this).val();
    navigator.clipboard.writeText(link);
    console.log(link);
  })
  
}

