<?php
include_once ("../../configuracion.php");
$objSession= new Session();
   
if ($objSession->activa()){
   $resp = $objSession->cerrar();
   header('Location: ../Home/home.php');
}

?>