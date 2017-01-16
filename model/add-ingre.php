<?php
session_start();
if( $_SESSION["lgin"] == true )
{
  //Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
  $conn = oci_connect('hr', 'hr', 'localhost/XE');
  if (!$conn)
  {
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }
  $prove = $_POST['prove'];
  $t_ingre= $_POST['t_ingre'];
  $detfac = $_POST['detfac'];
  $cantart= $_POST['cantart'];
  $nfactura= $_POST['nfactura'];
  $prefact= $_POST['prefact'];
  $nco = $_SESSION["nco"];
  $fecha = date("d/m/Y");

  if( $_SESSION["lgin"] == true ){

    $sql = 'begin ingreso(:fecha, :detfac, :nfactura, :prefact, :nco, :cantart, :prove, :t_ingre); end;';
    $stid = oci_parse($conn, $sql );
      oci_bind_by_name($stid, ':fecha', $fecha);
      oci_bind_by_name($stid, ':detfac', $detfac);
      oci_bind_by_name($stid, ':nfactura', $nfactura);
      oci_bind_by_name($stid, ':prefact', $prefact);
      oci_bind_by_name($stid, ':nco', $nco);
      oci_bind_by_name($stid, ':cantart', $cantart);
      oci_bind_by_name($stid, ':prove', $prove);
      oci_bind_by_name($stid, ':t_ingre', $t_ingre);
    $r = oci_execute($stid);
    if (!$r)
    {
      $e = oci_error($stid);  // Para errores de oci_execute, pase el gestor de sentencia
      echo $e['message']." ".$e['sqltext']." ".$e['offset']+1;
    }
    else
    {
      echo 1;
    }


  }
  oci_free_statement($stid);
  oci_close($conn);
}
?>
