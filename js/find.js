$(document).ready( function() {

$("#buscar").click( function() {
  var ci = $("#cedula").val();
  if($("#nac").val() == 1)
  {
    var nac = "V";
  }
  else if($("#nac").val() == 2)
  {
    var nac = "E";
  }
  var data = {
    "ci" : ci,
    "nac" : nac
    };

    $.ajax({
      data:  data,
      url:   '../model/seru.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
        $("#resultado").show();
      },
      success:  function ( data ) {
        $("#resultado").hide();
        var arr = data.respuesta.split(' ');
        $("#pnom").val(arr[0]);
        $("#pnom").prop('disabled', true);
        $("#snom").val(arr[1]);
        $("#snom").prop('disabled', true);
        $("#pape").val(arr[2]);
        $("#pape").prop('disabled', true);
        $("#sape").val(arr[3]);
        $("#sape").prop('disabled', true);


        $("#password").val(password(6, true));
      }
    });
  });

  function password(length, special) {
  var iteration = 0;
  var password = "";
  var randomNumber;
  if(special == undefined){
      var special = false;
  }
  while(iteration < length){
    randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
    if(!special){
      if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
      if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
      if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
      if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
    }
    iteration++;
    password += String.fromCharCode(randomNumber);
  }
  return password;
}

$("#limpia").click( function() {
  $("#pnom").val("");
  $("#snom").val("");
  $("#pape").val("");
  $("#sape").val("");
  $("#password").val("");
  $("#cedula").val("");
  $("#nac").val("");

  $("#pnom").prop('disabled', false);
  $("#snom").prop('disabled', false);
  $("#pape").prop('disabled', false);
  $("#sape").prop('disabled', false);
});

$("#agregar").click( function() {

  var pn   = $("#pnom").val();
  var sn   = $("#snom").val();
  var pa   = $("#pape").val();
  var sa   = $("#sape").val();
  var est  = $("#est").val();
  var pass = $("#password").val();
  var ci   = $("#cedula").val();
  var naci  = $("#nac").val();

  var data1 = {
    "pn"   : pn,
    "sn"   : sn,
    "pa"   : pa,
    "sa"   : sa,
    "est"  : est,
    "pass" : pass,
    "naci"  : naci,
    "ci"   : ci
    };

  $.ajax({
    data:  data1,
    url:   '../model/insert-u.php',
    type:  'post',
    beforeSend: function () {
      $("#resultado").show();
    },
    success:  function ( data1 ) {
      $("#resultado").hide();
      var arra = data1;
      if (arra == 1) {
          $("#exito").show();
      }else{
        alert("Ha ocurrido un error"+" "+data1);
      }

    }
  });
});




});
