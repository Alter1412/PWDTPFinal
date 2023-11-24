<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Usuarios";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
$objAbmUsuario = new AbmUsuario();
$objAbmUsuarioRol = new AbmUsuarioRol();
$objAbmRol = new AbmUsuarioRol();

$listaUsuarios = $objAbmUsuario->buscar(null);

//echo count($listaAuto);
//$listaPersona = $objAbmPersona->buscar(null);
//verEstructura($listaPersona);
?>


<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
  
</head>
<body>-->

<div class="container mt-4">

    <?php
    if (count($listaUsuarios) > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">
                <tr>
                    <th>ID USUARIO</th>
                    <th>NOMBRE</th>
                    <th>E-MAIL</th>
                    <th>ROL PRINCIPAL</th>
                    <th>FECHA DESHABILITADO</th>
                    <th>ACCION</th>
                </tr>
              </thead>';
        echo '<tbody>';
        for ($i = 0; $i < count($listaUsuarios); $i++) {
            $objUsuario = $listaUsuarios[$i];
            $usid['idusuario'] = $objUsuario->getIdUsuario();
            $relacionRol = $objAbmUsuarioRol->buscar($usid);
            if ($relacionRol == null) {
                $rolDesc = "-------";
            } else {
                $rolDesc = $relacionRol[0]->getObjRol()->getRolDescripcion();
            }

            echo '<tr>
                    <td>' . $objUsuario->getIdUsuario() . '</td>
                    <td>' . $objUsuario->getUsNombre() . '</td>
                    <td>' . $objUsuario->getUsMail() . '</td>
                    <td>' . $rolDesc . '</td>
                    <td>' . $objUsuario->getUsDeshabilitado() . '</td>
                    <td>
                        <a href="formActualizarUsuario.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-primary btn-sm">Actualizar</a>
                        <a href="asignarRoles.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-info btn-sm">Asignar Roles</a>
                        <a href="quitarRol.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-warning btn-sm">Quitar Roles</a>
                        <a href="action/deshabilitarUsuario.php?idusuario=' . $objUsuario->getIdUsuario() . '" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                  </tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo "<br>";
        
       
    } else {
        echo '<div class="alert alert-info" role="alert">No se encontraron Usuarios.</div>';
    }
    ?>
</div>

<?php
 echo "<br>";
?>

</body>
</html>

<?php
include_once("../Estructuras/footer.php");
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php	/*

 if( count($listaUsuarios)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>ID USUARIO</td><td>NOMBRE</td><td>E-MAIL</td><td>ROL</td><td>FECHA DESHABILITADO</td><td>ACCION</td></tr>';
    for($i=0;$i<count($listaUsuarios);$i++) {
        $objUsuario=$listaUsuarios[$i];
        $usid['idusuario'] = $objUsuario->getIdUsuario();
        //verEstructura($objUsuario);
       $relacionRol = $objAbmUsuarioRol->buscar($usid);
       if($relacionRol == null){
        $rolDesc = "-------";
       }else{
            $rolDesc  = $relacionRol[0]->getObjRol()->getRolDescripcion();
       }
      
        
        
    echo '<tr><td>'.$objUsuario->getIdUsuario().'</td>
              <td>'.$objUsuario->getUsNombre().'</td>
              <td>'.$objUsuario->getUsMail().'</td>
              <td>'.$rolDesc.'</td>
              <td>'.$objUsuario->getUsDeshabilitado().'</td>
              <td><a href="formActualizarUsuarios.php?idusuario='.$objUsuario->getIdUsuario().'">Actualizar</a> <a href="asignarRoles.php?idusuario='.$objUsuario->getIdUsuario().'">Asignar Roles</a> <a href="quitarRol.php?idusuario='.$objUsuario->getIdUsuario().'">Quitar Roles</a> <a href="action/deshabilitarUsuario.php?idusuario='.$objUsuario->getIdUsuario().'">Eliminar</a></td></tr>';
	}
    echo "</table><br><br><br>";
    echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
    
}else{
    echo "No se encontraron Usuarios";
}

*/?>

</body>
</html> -->