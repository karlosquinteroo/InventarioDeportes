$(document).ready(function() {

  $('#mydataTabledel_m').dataTable({
    "bProcessing": true,
    "sAjaxSource": '../model/data-del.php',
    aoColumns: [
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      {
          bSortable: false, className: "my_class",
          mRender: function (data, type, full) { return '<input type="checkbox" name="check1" value="'+data+'">'; }
      }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex )
    {
      $(nRow).attr('id', aData[6]);
    }
  });

  $('#muldel').on('click', function () {

    var selected = '';
    //recorremos todos los checkbox seleccionados con .each
    $('input[name="check1"]:checked').each(function() {
      selected += $(this).val()+',';
    });
    var newStr = selected.substring(0, selected.length-1);
    var nombres = newStr.split(",");

    var cantidad = nombres.length;

    var r = confirm( 'Desea eliminar elementos seleccionados? ');

    if (r == true)
    {
      var codigo = nombres;
      var parametros = {
        "codigo" : codigo,
        "nombres" : nombres,
        "cantidad" : cantidad
      };
      $.ajax({
        data:  parametros,
        url:   '../model/delm.php',
        type:  'post',
        beforeSend: function () {
          $("#resultado").show();
          $('#muldel').hide();
        },
        success:  function ( data )
        {
          console.log(data);
          $('#mydataTabledel_m').dataTable()._fnAjaxUpdate();
        }
      });
    $("#resultado").hide(5000, function(){
      alert("Articulos desincorporado exitosamente");
      $('#muldel').show();
      $('#mydataTabledel_m').dataTable()._fnAjaxUpdate();
    });
    }
    else
    {
      // no hace nada si no quiere eliminar el articulo
    }
  });
});
