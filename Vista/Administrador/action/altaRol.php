<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 
include_once ('../../../configuracion.php');
$datos = data_submitted();//estoy recibiendo el id del rol y el usuario
//verEstructura($datos);

$objRol = new AbmRol();
$exito = $objRol->alta($datos);
if($exito){
    header('Location:../gestionarRoles.php');
}else{
    echo "Algo fallo";
}

?>