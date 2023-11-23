<?php

include_once "../../../configuracion.php";
$datos = data_submitted();

$session = new Session();
$opcion = $datos['opcion'];
$_SESSION['rol'] = $opcion;

header("Location: ../../Home/home.php");
?>