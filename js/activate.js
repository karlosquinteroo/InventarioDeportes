$(document).ready(function() {

  $('#mydataTables').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/view_data.php',
      responsive: true
  } );

  $('#mydataTables_cat').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/view_cat.php',
      responsive: true
  } );

  $('#mydataTables_dep').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/view_dep.php',
      aoColumns: [
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[9]);
    }
  });

  $('#mydataTables_hpres').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/view-pres.php',
      aoColumns: [
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[0]);
    }
  });

  $('#mydataTables_des').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/view_des.php',
      aoColumns: [
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[9]);
    }
  } );

  $('#mydataTables_asign').dataTable( {
      "bProcessing": true,
      "sAjaxSource": '../model/view-assing.php',
      aoColumns: [
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, },
         { bSortable: false, }
    ],
    "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[0]);
    }
  } );

});
