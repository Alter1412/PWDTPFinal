<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 
include_once ('../../configuracion.php');
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

    <?php
    if( count($listaRoles)>0){
        echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
        echo '<tr><td>ID ROL</td><td>DESCRIPCION</td></tr>';
        for($i=0;$i<count($listaRoles);$i++) {
            $objRol=$listaRoles[$i];
            //verEstructura($objUsuario);
           
            
            
        echo '<tr><td>'.$objRol->getIdRol().'</td><td>'.$objRol->getRolDescripcion().'</td></tr>';
        }
        echo "</table><br><br><br>";
    
        
    }else{
        echo "No se encontraron Roles <br>";
    }
    ?>
    <form action="action/altaRol.php" method="post">
        <input type="text" name="idrol" id="idrol" hidden value=0>

        DESCRIPCION DEL ROL: <input type="text" id="rodescripcion" name="rodescripcion" > <br>
        
       
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html>