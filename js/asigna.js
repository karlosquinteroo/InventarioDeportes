$(document).ready(function() {

  $('#mydataTabledel_as').dataTable({
    "bProcessing": true,
    "sAjaxSource": '../model/data-asig.php',
    aoColumns: [
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      { bSortable: false, },
      {
          bSortable: false, className: "my_class",
          mRender: function (data, type, full, meta) { return '<input type="checkbox" name="check1" value="'+data+'">'; }
      }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex )
    {
      $(nRow).attr('id', aData[6]);
    }
  });

  $('#asignar').on('click', function () {

    var selected = '';
    //recorremos todos los checkbox seleccionados con .each
    $('input[name="check1"]:checked').each(function() {
      selected += $(this).val()+',';
    });
    var newStr = selected.substring(0, selected.length-1);
    var nombres = newStr.split(",");

    var cantidad = nombres.length;

    if( $('#disciplina').find(':selected').val() == '--Select--' )
    {
      $("#disciplina").parent().attr("class","has-error");
      alert("Debe seleccionar la disciplina");
    }

    alert(nombres);
    var disciplina = $('#disciplina').find(':selected').val();
    var r = confirm( 'Desea eliminar elementos seleccionados? ');

    if (r == true)
    {
      var codigo = nombres;
      var parametros = {
        "codigo" : codigo,
        "nombres" : nombres,
        "cantidad" : cantidad,
        "disciplina" : disciplina
      };
      $.ajax({
        data:  parametros,
        url:   '../model/add-asing.php',
        type:  'post',
        beforeSend: function () {
          $("#resultado").show();
          $('#asignar').hide();
        },
        success:  function ( data )
        {
          console.log(data);
          $('#mydataTabledel_as').dataTable()._fnAjaxUpdate();
        }
      });
    $("#resultado").hide(5000, function(){
      alert("Articulos asignados exitosamente");
      $('#asignar').show();
      $('#mydataTabledel_as').dataTable()._fnAjaxUpdate();
    });
    }
    else
    {
      // no hace nada si no quiere eliminar el articulo
    }
  });
});
