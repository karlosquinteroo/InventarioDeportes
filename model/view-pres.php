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
  $user = $_SESSION["nco"];
  if( $_SESSION["lgin"] == true )
  {
    $cod=1;
    $sql = 'SELECT
      dis.co_disciplina_serial dser, ta.co_serial_articulo arser, mar.co_serial_marca marser, art.nu_codigo_bien  codigo,
      art.tx_modelo  modelo,
      art.tx_color  color,
      mar.nb_marca  marca,
      count(art.co_descripcion)  cantidad,
      usr.nb_primer_nombre  nombre,
      usr.nb_primer_apellido  ape,
      mov.tx_descrip  descri
    FROM m004_articulo art
      join p013_marca mar on(art.co_marca = mar.co_marca and art.co_ser_marca = mar.co_serial_marca )
      join p010_tipo_articulo ta on(art.co_tipo_art = ta.co_tipo_articulo and art.co_tipo_sart = ta.co_serial_articulo)
      join p009_descripcion_articulo dea on(art.co_descripcion = dea.co_descripcion_articulo)
      join m002_disciplina dis on (art.co_disciplina = dis.co_disciplina and art.co_ser_disciplina = dis.co_disciplina_serial)
      join t003_det_mov tmov on (art.co_articulo = tmov.co_articulo )
      join t017_movimiento mov on (tmov.co_mov = mov.co_movi and mov.co_timov = :didbv)
      join m014_usuario usr on (mov.co_usuario = :usr)
    GROUP BY
      dis.co_disciplina_serial, ta.co_serial_articulo, mar.co_serial_marca, art.nu_codigo_bien,
      art.tx_modelo,
      art.tx_color,
      mar.nb_marca,
      usr.nb_primer_nombre ,
      usr.nb_primer_apellido ,
      mov.tx_descrip';
    $stid = oci_parse($conn, $sql);
    oci_bind_by_name($stid, ':didbv', $cod);
    oci_bind_by_name($stid, ':usr', $user);
    oci_execute($stid);


    $result = array();

    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS))
    {
      $result[] = array(
        $row['DSER']."-".$row['ARSER']."-".$row['MARSER']."-".$row['CODIGO'],
        $row['MODELO'],
        $row['COLOR'],
        $row['MARCA'],
        $row['CANTIDAD'],
        $row['NOMBRE']." ".$row['APE'],
        $row['DESCRI']
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
