<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 
include_once ('../../configuracion.php');
$idUsuario = data_submitted();//recibo el id del usuario
verEstructura($idUsuario);
$rol = new AbmRol();
$listaRoles = $rol->buscar(null);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   
    <form action="action/quitarRol.php" method="post">

   

    <?php
    if( count($listaRoles)>0){
        
        echo " ID DEL USUARIO: <input type='text' id='idusuario' name='idusuario' value=".$idUsuario['idusuario']." readonly> <br>";
        echo "ROLES A QUITAR: <br>";
        for($i=0;$i<count($listaRoles);$i++) {
            $objRol=$listaRoles[$i];
            //verEstructura($objUsuario);
           
            echo "<input type='checkbox' name='idrol' id='idrol' value=".$objRol->getIdRol().">".$objRol->getRolDescripcion()." <br>";
            
            
        }
        
    }else{
        echo "No se encontraron Roles <br>";
    }
    ?> 
       
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html>