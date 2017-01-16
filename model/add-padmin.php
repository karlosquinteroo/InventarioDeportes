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
    $nombres = $_POST['nombres'];
    $cantidad = $_POST['cantidad'];
    $cedula = $_POST['cedula'];
    $desc = $_POST['desc'];
    $fecha = date("d/m/Y");
    $user = $_SESSION["nco"];
    $tipo = 1;

  if( $nombres == "" ||  $cantidad =="" ||  $desc =="" )
  {
    echo 2;
  }
  else
  {
    $band = 0;
    if( $_SESSION["lgin"] == true )
    {
      $sql1 = 'begin movimiento(:person, usuarioget(:user), :desc, :fecha, :tipo); end;';
      $stid1 = oci_parse($conn, $sql1 );
        oci_bind_by_name($stid1, ':fecha', $fecha);
        oci_bind_by_name($stid1, ':person', $user);
        oci_bind_by_name($stid1, ':user', $cedula);
        oci_bind_by_name($stid1, ':desc', $desc);
        oci_bind_by_name($stid1, ':tipo', $tipo);
      $r1 = oci_execute($stid1);

      for ($i=0; $i < $cantidad; $i++)
      {
        $sql = 'begin artpresta(:codigo); end;';
        $stid = oci_parse($conn, $sql );
          oci_bind_by_name($stid, ':codigo', $nombres[$i]);
        $r = oci_execute($stid);

        $obser = "Solicitud De Prestamo";
        $sql2 = 'begin det_mov(:obser, :user, :codigo, :codigo); end;';
        $stid2 = oci_parse($conn, $sql2 );
          oci_bind_by_name($stid2, ':obser', $obser);
          oci_bind_by_name($stid2, ':user', $user);
          oci_bind_by_name($stid2, ':codigo', $nombres[$i]);
        $r2 = oci_execute($stid2);

        if (!$r || !$r1 || !$r2)
        {
          $e = oci_error($stid);  // Para errores de oci_execute, pase el gestor de sentencia
          echo $e['message']." ".$e['sqltext']." ".$e['offset']+1;
        }
        else
        {
          $band = 1;
        }
      }

      if( $band == 1 )
      {
        echo 1;
      }
    }
  }

  oci_free_statement($stid1);
  oci_free_statement($stid2);
  oci_free_statement($stid);
  oci_close($conn);

}//fin if principal

?>
