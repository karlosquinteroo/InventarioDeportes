$(document).ready(function() {
  var codigo;
  var discia;
  var modala;
  var marcaa;
  var tiarta;
  var modela;
  var colora;
  var costoa;
  var seriala;

  $('#mydataTable_e').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/data-edit.php',
      aoColumns: [
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         {
             bSortable: false, className: "my_class",
             mRender: function (o) { return '<a class="btn btn-success" data-toggle="modal" ><i class="fa fa-pencil fa-fw"></i></a>'; }
         }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[9]);
    }
  } );

    $('#mydataTable_e tbody').on('click', 'td.my_class', function () {
      codigo = $(this).parents('tr').attr('id');
      $('#example').modal('show');

      $(this).parents('tr').each(function(){
      /* Obtener todas las celdas */
      var celdas = $(this).find('td');
      $('#modelo_e').val($(celdas[1]).html());
      $('#color_e').val($(celdas[2]).html());
      $('#costo_e').val($(celdas[6]).html());
      $('#serial_e').val($(celdas[3]).html());
      discia = $(celdas[5]).html();
      colora = $(celdas[2]).html();
      //modala = $(celdas[7]).html();
      marcaa = $(celdas[4]).html();
      tiarta = $(celdas[8]).html();
      modela = $(celdas[1]).html();
      costoa = $(celdas[6]).html();
      seriala = $(celdas[3]).html();
    });

    } );

   $('#actualizar').on('click', function(){
    var disci  = $('#disciplina').find(':selected').val();
    //var modal  = $('#modalidad').find(':selected').val();
    var marca  = $('#marca').find(':selected').val();
    var tiar   = $('#tiart').find(':selected').val();
    var model  = $('#modelo_e').val();
    var color  = $('#color_e').val();
    var costo  = $('#costo_e').val();
    var serial = $('#serial_e').val();
    var desc = $('#modelo_e').val()+' '+$('#tiart').find(':selected').text()+' '+$('#marca').find(':selected').text()+' '+$('#color_e').val();

    var disciu = $('#disciplina').find(':selected').text();
    //var modu = $('#modalidad').find(':selected').text();
    var marcau = $('#marca').find(':selected').text();
    var tiaru = $('#tiart').find(':selected').text();

    var parametros = {
      "codigo" : codigo,
      "discia": discia,
      "disciu" : disciu,
      "disci" :  disci,
      "marcaa": marcaa,
      "marca" : marca,
      "marcau" : marcau,
      "tiarta" : tiarta,
      "tiar" : tiar,
      "tiaru" : tiaru,
      "model" : model,
      "modela" : modela,
      "color" : color,
      "colora" : colora,
      "costo" : costo,
      "costoa": costoa,
      "serial" : serial,
      "seriala": seriala
    };
    $.ajax({
      data:  parametros,
      url:   '../model/update-art.php',
      type:  'post',
      beforeSend: function () {
        $("#resultado").show();
      },
      success:  function ( data )
      {
        $("#resultado").hide(5000, function(){
          alert("Articulo actualizado exitosamente");
          $('#mydataTable_e').dataTable()._fnAjaxUpdate();
          $('#example').modal('hide');
        });
      }
    });

   });

   $("#exito").click( function() {
     location.reload();
   });



});
