$(document).ready(function() {

  $('#mydataTabledel').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/data-del.php',
      aoColumns: [
        { bSortable: false, },
        { bSortable: false, },
        { bSortable: false, },
        { bSortable: false, },
        { bSortable: false, },
        {
            bSortable: false, className: "my_class",
            mRender: function (o) { return '<a class="btn btn-danger" id="prueba" ><i class="fa fa-trash fa-fw"></i></a>'; }
        }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[5]);
    }
  } );
    $('#mydataTabledel tbody').on('click', 'td.my_class', function () {
        var codigo = $(this).parents('tr').attr('id');
        var serial;
        $(this).parents('tr').each(function(){
        /* Obtener todas las celdas */
        var celdas = $(this).find('td');
        serial = $(celdas[0]).html();
      });

        var r = confirm( 'Desea eliminar el articulo de serial '+serial );

        if (r == true) {
          var parametros = {
            "codigo" : codigo,
            "serial" : serial
          };
          $.ajax({
            data:  parametros,
            url:   '../model/del-art.php',
            type:  'post',
            dataType: 'json',
            beforeSend: function () {
              $("#resultado").show();
            },
            success:  function ( data )
            {
              $("#resultado").hide(5000, function(){
                alert("Articulo desincorporado exitosamente");
                $('#mydataTabledel').dataTable()._fnAjaxUpdate();
              });
            }
          });
        } else {
          // no hace nada si no quiere eliminar el articulo
        }
    } );

});
