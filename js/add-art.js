var seriales = new Array();
var f= 0;
var parametros2;
var parametros;
var disciplina;
var prove;
var t_ingre;
var modalidad;
var marca;
var tiart;
var detfac;
var cantart;
var nfactura;
var observ;
var modelo;
var color;
var desc;
var seri ="";
var datass;

$(document).ready( function()
 {
  $('#prefact').maskMoney();
  $('#costou').maskMoney();

  $('#prove').change(function (){
    if( $('#prove').find(':selected').val() == '--Select--' )
    {
      $("#prove").parent().attr("class","has-error");
	  	return false;
    }else{
      $("#prove").parent().removeClass("has-error");
      $("#prove").parent().attr("class","has-success");
    }
  });

    $('#t_ingre').change(function (){
      if( $('#t_ingre').find(':selected').val() == '--Select--' )
      {
        $("#t_ingre").parent().attr("class","has-error");
  	  	return false;
      }else{
        $("#t_ingre").parent().removeClass("has-error");
        $("#t_ingre").parent().attr("class","has-success");
      }
    });

    $('#disciplina').change(function (){
      if( $('#disciplina').find(':selected').val() == '--Select--' )
      {
        $("#disciplina").parent().attr("class","has-error");
  	  	return false;
      }else{
        $("#disciplina").parent().removeClass("has-error");
        $("#disciplina").parent().attr("class","has-success");
      }
    });

    $('#marca').change(function (){
      if( $('#marca').find(':selected').val() == '--Select--' )
      {
        $("#marca").parent().attr("class","has-error");
  	  	return false;
      }else{
        $("#marca").parent().removeClass("has-error");
        $("#marca").parent().attr("class","has-success");
      }
    });

    $('#tiart').change(function (){
      if( $('#tiart').find(':selected').val() == '--Select--' )
      {
        $("#tiart").parent().attr("class","has-error");
  	  	return false;
      }else{
        $("#tiart").parent().removeClass("has-error");
        $("#tiart").parent().attr("class","has-success");
      }
    });

    $('#detfac').keyup(function (){
      if( $('#detfac').val() == ucWords( $('#detfac').val() ) )
      {
        $("#detfac").parent().attr("class","has-success");
      }else
      {
        var val= ucWords( $('#detfac').val());
        $('#detfac').val( val );
        $("#detfac").parent().attr("class","has-error");
      }
    });

    $('#observ').keyup(function (){
      if( $('#observ').val() == ucWords( $('#observ').val() ) )
      {
        $("#observ").parent().attr("class","has-success");
      }else
      {
        var val= ucWords( $('#observ').val());
        $('#observ').val( val );
        $("#observ").parent().attr("class","has-error");
      }
    });

    $('#cantart').bind('keyup change click',function (){
      if( isNaN( $('#cantart').val() ) )
      {
        $("#cantart").parent().attr("class","has-error");
      }else
      {
        $("#cantart").parent().attr("class","has-success");
        cantart = $("#cantart").val();
      }
    });

    $('#desc').keyup(function (){
      if( $('#desc').val() == ucWords( $('#desc').val() ) )
      {
        $("#desc").parent().attr("class","has-success");
      }else
      {
        var val3= ucWords( $('#desc').val());
        $('#desc').val( val3 );
        $("#desc").parent().attr("class","has-error");
      }
    });

    $('#color').keyup(function (){
      if( $('#color').val() == ucWords( $('#color').val() ) )
      {
        $("#color").parent().attr("class","has-success");
      }else
      {
        var val2= ucWords( $('#color').val());
        $('#color').val( val2 );
        $("#color").parent().attr("class","has-error");
      }
    });

    $('#modelo').keyup(function (){
      if( $('#modelo').val() == ucWords( $('#modelo').val() ) )
      {
        $("#modelo").parent().attr("class","has-success");
      }else
      {
        var val1= ucWords( $('#modelo').val());
        $('#modelo').val( val1 );
        $("#modelo").parent().attr("class","has-error");
      }
    });

    $('#nfactura').keyup(function (){
      if( event.keyCode < 48 || event.keyCode > 57 )
      {
        var val= "";
        $('#nfactura').val( val );
        $("#nfactura").parent().attr("class","has-error");
      }else
      {
        $("#nfactura").parent().attr("class","has-success");
      }
    });


  $('#agregar').click(function() {
    valida();
  });

  $('#plus').click(function() {
    var aux= $('#serial').val().toUpperCase();
    if (f > (cantart-1))
    {
      alert("No puede exceder la cantidad de articulos");
    }
    else
    {
      if(aux == "" )
      {
        alert("El serial no puede ir en blanco");
        $("#serial").parent().attr("class","has-error");
      }
      else
      {
        seriales [f] = aux;
        f++;
        $('#serial').val("");
        if ($("div #list").empty() && seriales.length > 0)
        {
          for (var i = 0; i < seriales.length; i++) {
          $("div #list").append('<p><span class="glyphicon glyphicon-plus" aria-hidden="true"> '+seriales[i]+ '</span></p>');
          }
          $("div #list").show();
        }
        else
        {
          $("div #list").empty();
        }
        $("#serial").parent().attr("class","has-success");
      }
    }

  });

  $('#refresh').click(function() {
    var arrays = new Array()
    seriales.length=0;
    for (var i = 0; i < seriales.length; i++)
    {
      $("div #list").append('<p><span class="glyphicon glyphicon-plus" aria-hidden="true"> '+seriales[i]+ '</span></p>');
    }
    $("div #list").empty();
    f=0;
  });

});

function valida()
{
  var error = new Array()
  var i=0;
  var band = 1;
  if( $('#prove').find(':selected').val() == '--Select--' )
  {
    $("#prove").parent().attr("class","has-error");
    error[i]="Debe leccionar el proveedor"; i++; band =0;
  }

  if( $('#t_ingre').find(':selected').val() == '--Select--' )
  {
    $("#t_ingre").parent().attr("class","has-error");
    error[i]="Debe sleccionar el tipo de ingreso"; i++; band =0;
  }

  if( $('#disciplina').find(':selected').val() == '--Select--' )
  {
    $("#disciplina").parent().attr("class","has-error");
    error[i]="Debe seleccionar la disciplina"; i++; band =0;
  }
  if( $('#marca').find(':selected').val() == '--Select--' )
  {
    $("#marca").parent().attr("class","has-error");
    error[i]="Debe seleccionar la marca"; i++; band =0;
  }

  if( $('#tiart').find(':selected').val() == '--Select--' )
  {
    $("#tiart").parent().attr("class","has-error");
    error[i]="Debe seleccionar el tipo de articulo"; i++; band =0;
  }

  if( $('#detfac').val() == '' )
  {
    $("#detfac").parent().attr("class","has-error");
    error[i]="Debe ingrear el detalle de factura"; i++; band =0;
  }

  if( $('#cantart').val() == 0 || $('#cantart').val() < 0 || $('#cantart').val() == ''  )
  {
    $("#cantart").parent().attr("class","has-error");
    error[i]="Debe ingrear una cantidad correcta"; i++; band =0;
  }

  if( $('#nfactura').val() == '' )
  {
    $("#nfactura").parent().attr("class","has-error");
    error[i]="Debe ingrear el numero de factura"; i++; band =0;
  }

  if( $('#observ').val() == '' )
  {
    $("#observ").parent().attr("class","has-error");
    error[i]="Debe ingrear la obersvacion"; i++; band =0;
  }

  if( $('#modelo').val() == '' )
  {
    $("#modelo").parent().attr("class","has-error");
    error[i]="Debe ingrear el modelo"; i++; band =0;
  }

  if( $('#color').val() == '' )
  {
    $("#color").parent().attr("class","has-error");
    error[i]="Debe ingrear el color"; i++; band =0;
  }

  if( $('#desc').val() == '' )
  {
    $("#desc").parent().attr("class","has-error");
    error[i]="Debe ingrear el detalle de factura"; i++; band =0;
  }

  if ($("div.alert").empty() && error.length > 0)
  {
    for (var i = 0; i < error.length; i++) {
      $("div.alert").append('<p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">'+error[i]+'</span></p>');
    }
    $("div.alert").show();
  }else{
    $("div.alert").empty();
  }


  if(band == 1)
  {
    var num = $('#costou').maskMoney('unmasked')[0];
    num = String(num);
    var costou = num.replace(".","");

    var num = $('#prefact').maskMoney('unmasked')[0];
    num = String(num);
    var prefact = num.replace(".","");

    disciplina = $('#disciplina').find(':selected').val();
    prove = $('#prove').find(':selected').val();
    t_ingre = $('#t_ingre').find(':selected').val();
    marca= $('#marca').find(':selected').val();
    tiart = $('#tiart').find(':selected').val();
    detfac =  $('#detfac').val();
    cantart  =  $('#cantart').val();
    nfactura  = $('#nfactura').val();
    observ = $('#observ').val();
    modelo = $('#modelo').val();
    color = $('#color').val();
    desc = $('#desc').val();

    var parametros1 = {
      "prove" : prove,
      "t_ingre" : t_ingre,
      "detfac" : detfac,
      "cantart" : cantart,
      "nfactura" : nfactura,
      "prefact" : prefact
    };

    parametros2 = {
      "desc" : desc
    };

      parametros3 = {
        "observ" : observ,
        "cantart" : cantart
      };

    for (var i = 0; i < cantart; i++)
    {
      seri = seriales[i]+"."+seri;
    }
      parametros = {
        "disciplina" : disciplina,
        "marca" : marca,
        "tiart" : tiart,
        "modelo": modelo,
        "color" : color,
        "costou" : costou,
        "seri" : seri,
        "cantart" : cantart,
        "observ" : observ,
        "desc" : desc
      };
    var r = confirm("desea agregar estos articulos?") ;
    if ( r == true ) {
      agrega1(parametros1);
    }

  }//fin del if
  else
  {
    return false;
  }//fin else

}//fin function valida




function ucWords(string){
 var arrayWords;
 var returnString = "";
 var len;
 arrayWords = string.split(" ");
 len = arrayWords.length;
 for(i=0;i < len ;i++){
  if(i != (len-1)){
   returnString = returnString+ucFirst(arrayWords[i])+" ";
  }
  else{
   returnString = returnString+ucFirst(arrayWords[i]);
  }
 }
 return returnString;
}
function ucFirst(string){
 return string.substr(0,1).toUpperCase()+string.substr(1,string.length).toLowerCase();
}

function agrega1(string)
{

  $.ajax({
    data:  string,
    url:   '../model/add-ingre.php',
    type:  'post',
    dataType: 'json',
    beforeSend: function () {
      $("#resultado").show();
    },
    success:  function ( data )
    {
      var arra = data;
      if (arra)
      {
        agrega2(parametros2);
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown)
    {
     alert("some error");
    }
  });
}

function agrega2(string)
{

  $.ajax({
    data:  string,
    url:   '../model/add-desc.php',
    type:  'post',
    dataType: 'json',
    beforeSend: function () {
    },
    success:  function ( data )
    {
      var arra = data;
      if (arra)
      {
        agrega();
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown)
    {
     alert("some error");
    }
  });
}

function agrega()
{
  $.ajax({
    data:  parametros,
    url:   '../model/add-art.php',
    type:  'POST',
    beforeSend: function () {
    },
    success:  function ( data )
    {
      var arra = data;
      if (arra==1)
      {
        $("#resultado").hide(7000, function(){
          limpia();
          alert("articulo agregado exitosamente");
        });
      }
      if(arra==2)
      {
        alert("Ha ocurrido un error");
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown)
    {
     alert("some error");
    }
  });
}

function limpia()
{
  $('#costou').val("");
  $('#prefact').val("");
  $('#disciplina > option[value="10000"]').attr('selected', 'selected');
  $('#prove > option[value="10000"]').attr('selected', 'selected');
  $('#t_ingre > option[value="10000"]').attr('selected', 'selected');
  $('#marca > option[value="10000"]').attr('selected', 'selected');
  $('#tiart > option[value="10000"]').attr('selected', 'selected');
  $('#detfac').val("");
  $('#cantart').val("");
  $('#nfactura').val("");
  $('#observ').val("");
  $('#modelo').val("");
  $('#color').val("")
  $('#desc').val("");
}
