<?php
//Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_connect('hr', 'hr', 'localhost/XE');
if (!$conn)
{
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

  session_start();
  $ci = $_POST['ci'];
  $pw = $_POST['pw'];
  $_SESSION["lgin"] = false;

  $sql = 'select usr.co_usuario as co, usr.co_permiso as per, usr.nb_primer_apellido as pa, usr.nb_primer_nombre as pn
  from m014_usuario usr
  where usr.nu_cedula = :ci and usr.pw_password = :pw ';
  $stid = oci_parse($conn, $sql );
  oci_bind_by_name($stid, ':ci', $ci);
  oci_bind_by_name($stid, ':pw', $pw);

  //oci_execute($stid);

  $r = oci_execute($stid);
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
  {
      $_SESSION["nco"] = $row['CO'];
      $_SESSION["npe"] = $row['PER'];
      $_SESSION["npn"] = $row['PN'];
      $_SESSION["npa"] = $row['PA'];
      $_SESSION["lgin"] = true;
  }
  header("Location: auth.php");

  oci_free_statement($stid);
  oci_close($conn);


?>
