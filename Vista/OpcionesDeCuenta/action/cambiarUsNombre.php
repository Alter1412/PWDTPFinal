<?php
include_once "../../../configuracion.php";

$session = new Session();
$datos = data_submitted();
$usuario = $session->getUsuario();
$idUsuario['idusuario'] = $usuario->getIdUsuario();
$param['idusuario'] = $idUsuario;

$objAbmUsuario = new AbmUsuario();
$colUsuario = $objAbmUsuario->buscar($param);

$param2['usnombre'] = $datos['usnombre'];

$resultadoNombreRepetido = $objAbmUsuario->buscar($param2);

if (count($resultadoNombreRepetido) == 0){

    $param['usnombre'] = $datos['usnombre'];
    $param['usmail'] = $colUsuario[0]->getUsMail();
    $param['uspass'] = $colUsuario[0]->getUsPass();
    $param['usdeshabilitado'] = NULL;
    
    $resultado = $objAbmUsuario->modificar($param);
    
    if ($resultado){
        $respuesta = array("resultado" => "exito", "mensaje" => "Nombre de usuario cambiado con éxito.");
        $session->actualizarNombre($datos['usnombre']);
        
    } else {
        $respuesta = array("resultado" => "error", "mensaje" => "No pudo cambiarse el nombre de usuario.");
    }

} else {
    $respuesta = array("resultado" => "error", "mensaje" => "El nombre de usuario elegido ya se encuentra en uso.");
}

echo json_encode($respuesta);
?>