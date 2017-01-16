    <?php
//Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
$conn = oci_connect('hr', 'hr', 'localhost/XE');
if (!$conn)
{
  $e = oci_error();
  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}


$ci = $_POST['ci'];
$na = $_POST['naci'];
$pnom = $_POST['pn'];
$snom = $_POST['sn'];
$pape = $_POST['pa'];
$sape = $_POST['sa'];
$codper = $_POST['est'];
$pass = $_POST['pass'];
$fecha = date("d/m/Y");

if( $_POST['naci'] == 1 )
{
  $na="V";
}
else if( $_POST['naci'] == 2 )
{
  $na="E";
}
$sql = 'begin crear_usuario(:ci, :na, :pnom, :snom, :pape, :sape, :codper, :pass, :fecha); end;';
$stid = oci_parse($conn, $sql );
  oci_bind_by_name($stid, ':ci', $ci);
  oci_bind_by_name($stid, ':na', $na);
  oci_bind_by_name($stid, ':pnom', $pnom);
  oci_bind_by_name($stid, ':snom', $snom);
  oci_bind_by_name($stid, ':pape', $pape);
  oci_bind_by_name($stid, ':sape', $sape);
  oci_bind_by_name($stid, ':codper', $codper);
  oci_bind_by_name($stid, ':pass', $pass);
  oci_bind_by_name($stid, ':fecha', $fecha);

//oci_execute($stid);

$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);  // Para errores de oci_execute, pase el gestor de sentencia
    echo $e['message']." ".$e['sqltext']." ".$e['offset']+1;
}else{
  echo 1;
}

oci_free_statement($stid);
oci_close($conn);


?>
