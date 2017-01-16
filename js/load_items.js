$(document).ready( function() {
  CheckAjaxCall();
  CheckAjaxCall1();
  CheckAjaxCall2();
  CheckAjaxCall3();
  CheckAjaxCall4();
  CheckAjaxCall5();
});

  function CheckAjaxCall()
  {
    var band =0;
    var parametros = {
      "band" : band
    };
    $.ajax({
      data:  parametros,
      url:   '../model/select.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
      },
      success:  function ( data ) {
        $.each(data, function(i, item) {
        var div_data="<option value="+item.cod+">"+item.desc+"</option>";
        $(div_data).appendTo('#marca');
      });
      }
    });

    return false;
  }

  function CheckAjaxCall1()
  {
    var band =1;
    var parametros = {
      "band" : band
    };
    $.ajax({
      data:  parametros,
      url:   '../model/select.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
      },
      success:  function ( data ) {
        $.each(data, function(i, item) {
        var div_data="<option value="+item.codd+">"+item.descd+"</option>";
        $(div_data).appendTo('#disciplina');
      });
      }
    });

    return false;
  }

  function CheckAjaxCall2()
  {
    var band =2;
    var parametros = {
      "band" : band
    };
    $.ajax({
      data:  parametros,
      url:   '../model/select.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
      },
      success:  function ( data ) {
        $.each(data, function(i, item) {
        var div_data="<option value="+item.codt+">"+item.desct+"</option>";
        $(div_data).appendTo('#t_ingre');
      });
      }
    });

    return false;
  }

  function CheckAjaxCall3()
  {
    var band =3;
    var parametros = {
      "band" : band
    };
    $.ajax({
      data:  parametros,
      url:   '../model/select.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
      },
      success:  function ( data ) {
        $.each(data, function(i, item) {
        var div_data="<option value="+item.coda+">"+item.desca+"</option>";
        $(div_data).appendTo('#tiart');
      });
      }
    });

    return false;
  }


  function CheckAjaxCall4()
  {
    var band =4;
    var parametros = {
      "band" : band
    };
    $.ajax({
      data:  parametros,
      url:   '../model/select.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
      },
      success:  function ( data ) {
        $.each(data, function(i, item) {
        var div_data="<option value="+item.codm+">"+item.descm+"</option>";
        $(div_data).appendTo('#modalidad');
      });
      }
    });

    return false;
  }

  function CheckAjaxCall5()
  {
    var band =5;
    var parametros = {
      "band" : band
    };
    $.ajax({
      data:  parametros,
      url:   '../model/select.php',
      type:  'post',
      dataType: 'json',
      beforeSend: function () {
      },
      success:  function ( data ) {
        $.each(data, function(i, item) {
        var div_data="<option value="+item.codp+">"+item.nprov+"</option>";
        $(div_data).appendTo('#prove');
      });
      }
    });

    return false;
  }
