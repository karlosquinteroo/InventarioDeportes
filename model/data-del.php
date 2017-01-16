<?php

// Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_connect('hr', 'hr', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

  $stid = oci_parse($conn, 'SELECT * FROM articulos');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      $row['CODIGO'],
      $row['MODELO'],
      $row['COLOR'],
      $row['MARCA'],
      $row['UBICACION'],
      $row['CANTIDAD'],
      $row['CODIG']
    );

  }
  $response = array();
  $response['success'] = true;
  $response['aaData'] = $result;
  echo json_encode($response);


?>
