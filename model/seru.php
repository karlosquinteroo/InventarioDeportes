<?php
header('Content-type: application/json; charset=utf8');
$ci = $_POST['ci'];
$nac= $_POST['nac'];
$data = array('nac' => $nac, 'ced' => $ci );
$url = 'http://control2.unet.edu.ve/destudiantil-dev/Destudiantil/scripts/Serv_DatosPers.php';
$json = json_encode($data);
//echo $url;
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
$result = json_decode($result);
curl_close($curl);
$resultado['respuesta'] = $result->NOMBRE[0];
echo json_encode($resultado);


?>
