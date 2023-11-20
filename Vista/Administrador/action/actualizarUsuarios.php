<?php 
include_once ('../../../configuracion.php');
$datos = data_submitted();
verEstructura($datos);
$objUsuario = new AbmUsuario();

//$existe = $objUsuario->existen($datos);
//if ($existe == false){

    $exito = $objUsuario->modificar($datos);
    if($exito){
        echo "Usuario actuaizado";
    }else{
        echo "Algo fallo";
    }
//}else{
    //echo "existe usuario";
//}



?>