    <?php
//Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_connect('hr', 'hr', 'localhost/XE');
if (!$conn)
{
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

  session_start();
  $desc= $_POST['desc'];


  if( $_SESSION["lgin"] == true ){

    $sql = 'begin descripcion_art( :desc ); end;';
    $stid = oci_parse($conn, $sql );
      oci_bind_by_name($stid, ':desc', $desc);
    $r = oci_execute($stid);
    if (!$r)
    {
      $e = oci_error($stid);  // Para errores de oci_execute, pase el gestor de sentencia
      echo $e['message']." ".$e['sqltext']." ".$e['offset']+1;
    }
    else{
      echo 1;
    }

}

  oci_free_statement($stid);
  oci_close($conn);


?>
