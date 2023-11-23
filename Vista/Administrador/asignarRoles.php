<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 
include_once('../../configuracion.php');
$tituloPagina = "Gestionar Usuarios";
$menu = "Gestionar Usuarios";
$direccion = " 	Administrador";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
$idUsuario = data_submitted();//recibo el id del usuario
//verEstructura($idUsuario);
$rol = new AbmRol();
$listaRoles = $rol->buscar(null);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Roles</title>
    <!-- Enlaces a Bootstrap CSS -->
    
</head>
<body>

<div class="container mt-4">
    <form action="action/asignarRol.php" method="post">
        <?php
        if (count($listaRoles) > 0) {
            echo "<div class='form-group'>";
            echo "ID DEL USUARIO: <input type='text' class='form-control' id='idusuario' name='idusuario' value=" . $idUsuario['idusuario'] . " readonly><br>";
            echo "ROLES A ASIGNAR:<br>";
            for ($i = 0; $i < count($listaRoles); $i++) {
                $objRol = $listaRoles[$i];
                echo "<div class='form-check'>";
                echo "<input type='checkbox' class='form-check-input' name='idrol' id='idrol' value=" . $objRol->getIdRol() . ">";
                echo "<label class='form-check-label' for='idrol'>" . $objRol->getRolDescripcion() . "</label>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No se encontraron Roles</p>";
        }
        ?>
        <br>
        <button type="submit" class="btn btn-primary mt-2">Asignar Roles</button>
        
    </form>
</div>


<br>

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

   
    <form action="action/asignarRol.php" method="post">

   

    <?php /*
    if( count($listaRoles)>0){
        
        //echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
        //echo '<tr><td>ID ROL</td><td>DESCRIPCION</td></tr>';
        echo " ID DEL USUARIO: <input type='text' id='idusuario' name='idusuario' value=".$idUsuario['idusuario']." readonly> <br>";
        echo "ROLES A ASIGNAR: <br>";
        for($i=0;$i<count($listaRoles);$i++) {
            $objRol=$listaRoles[$i];
            //verEstructura($objUsuario);
           
            echo "<input type='checkbox' name='idrol' id='idrol' value=".$objRol->getIdRol().">".$objRol->getRolDescripcion()." <br>";
            
            //echo '<tr><td>'.$objRol->getIdRol().'</td><td>'.$objRol->getRolDescripcion().'</td></tr>';
        }
        //echo "</table><br><br><br>";
    
        
    }else{
        echo "No se encontraron Roles <br>";
    }
    */?>


        
        
       
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html> -->