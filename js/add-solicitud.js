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

$(document).ready( function()
 {

   $('#mydataTable_presta').dataTable({
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

   $('#motivo').keyup(function (){
     if( $('#motivo').val() == ucWords( $('#motivo').val() ) )
     {
       $("#motivo").parent().attr("class","has-success");
     }else
     {
       var val1= ucWords( $('#motivo').val());
       $('#motivo').val( val1 );
       $("#motivo").parent().attr("class","has-error");
     }
   });

   $('#presta').click(function() {
     var selected = '';
     //recorremos todos los checkbox seleccionados con .each
     $('input[name="check1"]:checked').each(function() {
       selected += $(this).val()+',';
     });
     var newStr = selected.substring(0, selected.length-1);
     var nombres = newStr.split(",");

     var cantidad = nombres.length;

     var desc = $('#motivo').val();

     parametros = {
       "nombres" : nombres,
       "cantidad" : cantidad,
       "desc"     : desc
     };

     console.log(desc);
     var r = confirm("desea solicitar estos articulos?") ;
     if ( r == true )
     {
       $.ajax({
         data:  parametros,
         url:   '../model/add-prestamo.php',
         type:  'POST',
         beforeSend: function () {
         },
         success:  function ( data )
         {
           console.log(data);
           var arra = data;
           if (arra==1)
           {
             $("#resultado").hide(7000, function(){
               alert("Solicitud procesada exitosamente");
             });
           }
           if(arra != 1)
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

   });



 });
