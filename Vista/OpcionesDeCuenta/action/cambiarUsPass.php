<?php
include_once "../../../configuracion.php";

$session = new Session();
$datos = data_submitted();
$usuario = $session->getUsuario();
$idUsuario['idusuario'] = $usuario->getIdUsuario();
$param['idusuario'] = $idUsuario;

$objAbmUsuario = new AbmUsuario();
$colUsuario = $objAbmUsuario->buscar($param);

$param['uspass'] = $datos['uspass'];
$param['usnombre'] = $colUsuario[0]->getUsNombre();
$param['usmail'] = $colUsuario[0]->getUsMail();
$param['usdeshabilitado'] = null;

$resultado = $objAbmUsuario->modificar($param);

if ($resultado){
    $respuesta = array("resultado" => "exito", "mensaje" => "Contraseña cambiada con éxito.");
} else {
    $respuesta = array("resultado" => "error", "mensaje" => "No pudo cambiarse la contraseña.");
}

echo json_encode($respuesta);
?>