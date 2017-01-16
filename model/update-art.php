    <?php
//Conectar al servicio XE (es deicr, la base de datos) en la máquina "localhost"
session_start();
if( $_SESSION["lgin"] == true )
{
  $conn = oci_connect('hr', 'hr', 'localhost/XE');
  if (!$conn)
  {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  if( $_SESSION["lgin"] == true )
  {
    $descripcion = array();
    $i=0;
    $band=0;
    $codigo = $_POST['codigo'];
    $discia = $_POST['discia'];
    $disciu = $_POST['disciu'];
    $disci = $_POST['disci'];
    $marcaa = $_POST['marcaa'];
    $marca = $_POST['marca'];
    $marcau = $_POST['marcau'];
    $tiarta = $_POST['tiarta'];
    $tiar = $_POST['tiar'];
    $tiaru = $_POST['tiaru'];
    $model = $_POST['model'];
    $modela = $_POST['modela'];
    $color = $_POST['color'];
    $colora = $_POST['colora'];
    $costo = $_POST['costo'];
    $costoa = $_POST['costoa'];
    $seriala = $_POST['seriala'];
    $serial = $_POST['serial'];

    if( $discia != $disciu )
    {
      $descripcion[$i] ="Cambio De diciplina: ".$discia." Por -> ".$disciu.",";
      $i++;
    }

    if($marcaa != $marcau )
    {
      $descripcion[$i] ="Cambio De Marca: ".$marcaa." Por -> ".$marcau.",";
      $i++;
    }

    if($tiarta != $tiaru )
    {
      $descripcion[$i] ="Cambio De Tipo: ".$tiarta." Por -> ".$tiaru.",";
      $i++;
    }

    if($model != $modela )
    {
      $descripcion[$i] ="Cambio De Modelo: ".$model." Por -> ".$modela.",";
      $i++;
    }

    if($color != $colora )
    {
      $descripcion[$i] ="Cambio De Color: ".$color." Por -> ".$colora.",";
      $i++;
    }

    if($costo != $costoa )
    {
      $descripcion[$i] ="Cambio De Costo: ".$costo." Por -> ".$costoa.",";
      $i++;
    }

    if($seriala != $serial )
    {
      $descripcion[$i] ="Cambio De Serial: ".$seriala." Por -> ".$serial.",";
      $i++;
    }
    $desc="";
    for ($i=0; $i < count($descripcion); $i++) {
      $desc= $desc." ".$descripcion[$i];
    }

    $user = $_SESSION["nco"];
    $fecha = date("d/m/Y");
    $tipo = 21;
    $modal = 0;
    $sql = 'begin articulo_update(:model, :codigo, :color, :costo, :serial, :marca, :tiar, :modal, :disci); end;';
    $stid = oci_parse($conn, $sql );
      oci_bind_by_name($stid, ':model', $model);
      oci_bind_by_name($stid, ':codigo', $codigo);
      oci_bind_by_name($stid, ':color', $color);
      oci_bind_by_name($stid, ':costo', $costo);
      oci_bind_by_name($stid, ':serial', $serial);
      oci_bind_by_name($stid, ':marca', $marca);
      oci_bind_by_name($stid, ':tiar', $tiar);
      oci_bind_by_name($stid, ':modal', $modal);
      oci_bind_by_name($stid, ':disci', $disci);
    $r = oci_execute($stid);

    $sql1 = 'begin movimiento(:person, :user, :desc, :fecha, :tipo); end;';
    $stid1 = oci_parse($conn, $sql1 );
      oci_bind_by_name($stid1, ':fecha', $fecha);
      oci_bind_by_name($stid1, ':person', $user);
      oci_bind_by_name($stid1, ':user', $user);
      oci_bind_by_name($stid1, ':desc', $desc);
      oci_bind_by_name($stid1, ':tipo', $tipo);
    $r1 = oci_execute($stid1);

    $obser = "Actualizacion De Articulos";

    $sql2 = 'begin det_mov(:obser, :user, :codigo, :codigo); end;';
    $stid2 = oci_parse($conn, $sql2 );
      oci_bind_by_name($stid2, ':obser', $obser);
      oci_bind_by_name($stid2, ':user', $user);
      oci_bind_by_name($stid2, ':codigo', $codigo);
    $r2 = oci_execute($stid2);

    if ( !$r || !$r1 || !$r2 ) {
        $e = oci_error($stid);  // Para errores de oci_execute, pase el gestor de sentencia
        echo $e['message']." ".$e['sqltext']." ".$e['offset']+1;
    }else{
      $band = 1;
    }

    if( $band == 1 )
    {
      echo 1;
    }

    oci_free_statement($stid);
    oci_close($conn);
  }

}//fin if principal
?>
