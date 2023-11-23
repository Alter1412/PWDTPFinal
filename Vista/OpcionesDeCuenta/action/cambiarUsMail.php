<?php
include_once "../../../configuracion.php";

//session_start();
$session = new Session();
$datos = data_submitted();
$usuario = $session->getUsuario();
$idUsuario['idusuario'] = $usuario->getIdUsuario();
$param['idusuario'] = $idUsuario;

$objAbmUsuario = new AbmUsuario();
$colUsuario = $objAbmUsuario->buscar($param);

$param['usmail'] = $datos['usmail'];

if (filter_var($param['usmail'], FILTER_VALIDATE_EMAIL)) {

    $param['usnombre'] = $colUsuario[0]->getUsNombre();
    $param['uspass'] = $colUsuario[0]->getUsPass();
    $param['usdeshabilitado'] = null;

    $resultado = $objAbmUsuario->modificar($param);

    if ($resultado){
      
        $respuesta = array("resultado" => "exito", "mensaje" => "Dirección de mail cambiada con éxito.");
        $session->actualizarEmail($param['usmail']);
        
    } else {
        $respuesta = array("resultado" => "error", "mensaje" => "No pudo cambiarse la dirección de mail.");
    }

} else {
    $respuesta = array("resultado" => "error", "mensaje" => "No pudo cambiarse la dirección de mail.\nLa dirección no tiene un formato válido.");
}

echo json_encode($respuesta);
?>