<?php
session_start();
session_destroy();
$pagina = "../index.php";
header("Location: $pagina");
 ?>
