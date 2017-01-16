<?php
session_start();
if( $_SESSION["lgin"] == true )
{
    // Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
  $conn = oci_connect('hr', 'hr', 'localhost/XE');
  if (!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  if( $_SESSION["lgin"] == true )
  {
    $stid = oci_parse($conn, 'SELECT * FROM articulo_des');
    oci_execute($stid);


    $result = array();

    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
      $_SESSION["codigo"] = $row['CODIGO'];
      $_SESSION["MODELO"] = $row['MODELO'];
      $_SESSION["COLOR"] = $row['COLOR'];
      $_SESSION["SERIAL"] = $row['SERIAL'];
      $_SESSION["MARCA"] = $row['MARCA'];
      $_SESSION["DISCIPLINA"] = $row['DISCIPLINA'];
      $_SESSION["COSTO"] = $row['COSTO'];
      $_SESSION["MODALIDAD"] = $row['MODALIDAD'];
      $_SESSION["TIPO"] = $row['TIPO'];
      $_SESSION["CODIG"] = $row['CODIG'];

      $result[] = array(
        $row['CODIGO'],
        $row['MODELO'],
        $row['COLOR'],
        $row['SERIAL'],
        $row['MARCA'],
        $row['DISCIPLINA'],
        $row['COSTO'],
        $row['MODALIDAD'],
        $row['TIPO'],
        $row['CODIG']
      );

    }
    $response = array();
    $response['success'] = true;
    $response['aaData'] = $result;
    echo json_encode($response);
  }
  oci_free_statement($stid);
  oci_close($conn);
}
?>
