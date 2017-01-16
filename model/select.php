<?php

// Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_connect('hr', 'hr', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$res = $_POST['band'];
if($res == 0 )
{
  $stid = oci_parse($conn, 'SELECT * FROM marca');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      'cod' => $row['CODIGOM'],
      'desc' => $row['DESCM']
    );

  }
  echo json_encode($result);
}

if($res == 1 )
{
  $stid = oci_parse($conn, 'SELECT * FROM disciplina');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      'codd' => $row['CODIGOD'],
      'descd' => $row['DESCD']
    );

  }
  echo json_encode($result);
}


if($res == 2 )
{
  $stid = oci_parse($conn, 'SELECT * FROM tingre');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      'codt' => $row['CODIGOTI'],
      'desct' =>$row['DESCIN']
    );

  }
  echo json_encode($result);
}

if($res == 3 )
{
  $stid = oci_parse($conn, 'SELECT * FROM tipoart');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      'coda' => $row['CODIGO'],
      'desca' =>$row['DESCRIPCION']
    );

  }
  echo json_encode($result);
}


if($res == 4 )
{
  $stid = oci_parse($conn, 'SELECT * FROM modalidad');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      'codm' => $row['CODIGOMOD'],
      'descm' =>$row['DESCMOD']
    );

  }
  echo json_encode($result);
}

if($res == 5 )
{
  $stid = oci_parse($conn, 'SELECT * FROM provee');
  oci_execute($stid);


  $result = array();

  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $result[] = array(
      'codp' => $row['CODIGOP'],
      'nprov' =>$row['NPROV']
    );

  }
  echo json_encode($result);
}


?>
