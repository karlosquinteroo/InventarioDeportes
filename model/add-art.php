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
    $jcolor = $_POST['color'];
    $jmodelo = $_POST['modelo'];
    $jdisciplina = $_POST['disciplina'];
    $jmodalidad = 1;
    $jmarca = $_POST['marca'];
    $jtiart = $_POST['tiart'];
    $jcostou = $_POST['costou'];
    $jseri = $_POST['seri'];
    $jcantart = $_POST['cantart'];
    $jdesc = $_POST['desc'];
    $jobserv = $_POST['observ'];

  if( $jcolor == "" ||  $jmodelo =="" ||  $jdisciplina =="" ||  $jmodalidad =="" || $jmarca =="" ||  $jtiart =="" || $jcostou=="" || $jseri =="" || $jcantart =="" ||  $jobserv =="" )
  {
    echo 2;
  }
  else
  {
    $jdesc = 1;
    $band = 0;
    $jseri = trim($jseri, '.');
    $arra = explode(".", $jseri);
    if( $_SESSION["lgin"] == true )
    {
      for ($i=0; $i < $jcantart; $i++)
      {
        $sql = 'begin articulo (:modelo, :color, :costou, :seri, :marca, :marca, :tiart, :tiart, :desc, :disciplina, :disciplina, :modalidad, 3 ); end;';
        $stid = oci_parse($conn, $sql );
          oci_bind_by_name($stid, ':modelo', $jmodelo);
          oci_bind_by_name($stid, ':color', $jcolor);
          oci_bind_by_name($stid, ':costou', $jcostou);
          oci_bind_by_name($stid, ':seri', $arra[$i]);
          oci_bind_by_name($stid, ':marca', $jmarca);
          oci_bind_by_name($stid, ':tiart', $jtiart);
          oci_bind_by_name($stid, ':desc', $jdesc);
          oci_bind_by_name($stid, ':disciplina', $jdisciplina);
          oci_bind_by_name($stid, ':modalidad', $jmodalidad);
        $r = oci_execute($stid);

        $sql1 = 'begin det_ingreso (:jobserv,( ultimocoart(0) ), ( ultimoseart(0) ), ( ultimoingre(0) ) ); end;';
        $stid1 = oci_parse($conn, $sql1 );
          oci_bind_by_name($stid1, ':jobserv', $jobserv);
        $r1 = oci_execute($stid1);

        if (!$r || !$r1)
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

  oci_free_statement($stid);
  oci_close($conn);

}//fin if principal

?>
