<?php
include_once '../../../configuracion.php';

// Encapsulo los datos para crear usuario nuevo
$datos = data_submitted();
verEstructura($datos);

// Extraigo datos necesarios para la creación de usuario
$usuario = $datos['usnombre'];
$email = $datos['usmail'];
$passEncriptada= md5($datos['uspass']);

//creo los objetos Usuario y objeto UsuarioRol
$objUsuario = new AbmUsuario();



//Guardo los parametros del Usuario
$paramUsuario['idusuario'] = 0;
$paramUsuario['usnombre'] = $usuario;
$paramUsuario['uspass'] = $passEncriptada;
$paramUsuario['usmail'] = $email;
$paramUsuario['usdeshabilitado'] = "'0000-00-00 00:00:00'";

//Lo cargo a la base de datos
$exito = $objUsuario->alta($paramUsuario);


if($exito){
    $objUsuarioRol = new AbmUsuarioRol();

    $paramUsuario2['usnombre'] = $usuario;
    $nuevoUsuario = $objUsuario->buscar($paramUsuario2);
    $idUsuario = $nuevoUsuario[0]->getIdUsuario();
    $paramUsuarioRol['idusuario'] = $idUsuario;
    echo $idUsuario."<br>";
    if(array_key_exists('Cliente', $datos)){
        echo "Entro a Cliente <br>";
        $paramUsuarioRol['idrol'] = 3;
        verEstructura($paramUsuarioRol);
        $objUsuarioRol->alta($paramUsuarioRol);
    }
    if(array_key_exists('Deposito', $datos)){
        $paramUsuarioRol['idrol'] = 2;
        $objUsuarioRol->alta($paramUsuarioRol);
    }
    if(array_key_exists('Admin', $datos)){
        $paramUsuarioRol['idrol'] = 1;
        $objUsuarioRol->alta($paramUsuarioRol);
    }
    
    //Hacer un ajax que muestre un cartelito de que se creo o no el usuario
    header('Location: ../crearUsuarios.php');

}else{
    header('Location: ../crearUsuarios.php');
}




?>