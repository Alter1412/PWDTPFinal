<?php
include_once "../../configuracion.php";
$objAbmUsuario = new AbmUsuario();


$listaUsuarios = $objAbmUsuario->buscar(null);

//echo count($listaAuto);
//$listaPersona = $objAbmPersona->buscar(null);
//verEstructura($listaPersona);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php	

 if( count($listaUsuarios)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>ID USUARIO</td><td>NOMBRE</td><td>E-MAIL</td><td>FECHA DESHABILITADO</td><td>ACCION</td></tr>';
    for($i=0;$i<count($listaUsuarios);$i++) {
        $objUsuario=$listaUsuarios[$i];
        //verEstructura($objUsuario);
       
        
        
    echo '<tr><td>'.$objUsuario->getIdUsuario().'</td>
              <td>'.$objUsuario->getUsNombre().'</td>
              <td>'.$objUsuario->getUsMail().'</td>
              <td>'.$objUsuario->getUsDeshabilitado().'</td>
              <td><a href="formActualizarUsuarios.php?idusuario='.$objUsuario->getIdUsuario().'">Actualizar</a> <a href="asignarRoles.php?idusuario='.$objUsuario->getIdUsuario().'">Asignar Roles</a> <a href="quitarRol.php?idusuario='.$objUsuario->getIdUsuario().'">Quitar Roles</a> <a href="action/deshabilitarUsuario.php?idusuario='.$objUsuario->getIdUsuario().'">Eliminar</a></td></tr>';
	}
    echo "</table><br><br><br>";
    echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
    
}else{
    echo "No se encontraron Usuarios";
}

?>

</body>
</html>