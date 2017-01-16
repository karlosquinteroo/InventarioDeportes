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
  $codigo = $_POST['codigo'];
  $nombres= $_POST['nombres'];
  $cantidad= $_POST['cantidad'];
  $disciplina= $_POST['disciplina'];
  $nco = $_SESSION["nco"];
  $fecha = date("d/m/Y");
  $descrip = "Asignacion De Articulos";
  if( $_SESSION["lgin"] == true )
  {
    $sql = 'begin asigna_pro(:fecha, :descrip, :cantidad, :nco, :disciplina); end;';
    $stid = oci_parse($conn, $sql );
      oci_bind_by_name($stid, ':fecha', $fecha);
      oci_bind_by_name($stid, ':descrip', $descrip);
      oci_bind_by_name($stid, ':cantidad', $cantidad);
      oci_bind_by_name($stid, ':nco', $nco);
      oci_bind_by_name($stid, ':disciplina', $disciplina);
    $r = oci_execute($stid);

    for ($i=0; $i < count($codigo) ; $i++)
    {
      $sql2 = 'begin artasi(:codigo); end;';
      $stid2 = oci_parse($conn, $sql2 );
      oci_bind_by_name($stid2, ':codigo', $codigo[$i]);
      $r2 = oci_execute($stid2);
    }
    for ($i=0; $i < count($codigo) ; $i++)
    {
      $sql1 = 'begin det_asigna(:codigo); end;';
      $stid1 = oci_parse($conn, $sql1 );
      oci_bind_by_name($stid1, ':codigo', $codigo[$i]);
      $r1 = oci_execute($stid1);
    }

    if (!$r || !$r1 || !$r2)
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
