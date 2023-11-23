<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 
include_once ('../../configuracion.php');
$tituloPagina = "Gestionar Usuarios";
$menu = "Gestionar Usuarios";
$direccion = " 	Administrador";
include_once ("../Estructuras/headSeguro.php");
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
    <title>Quitar Roles</title>
   
    
</head>
<body>

<div class="container mt-4">
    <form action="action/quitarRol.php" method="post">
        <?php
        if (count($listaRoles) > 0) {
            echo "<div class='form-group'>";
            echo "ID DEL USUARIO: <input type='text' class='form-control' id='idusuario' name='idusuario' value=" . $idUsuario['idusuario'] . " readonly><br>";
            echo "ROLES A QUITAR:<br>";
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
        <button type="submit" class="btn btn-danger mt-2">Quitar Roles</button>
        
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

   
    <form action="action/quitarRol.php" method="post">

   

    <?php /*
    if( count($listaRoles)>0){
        
        echo " ID DEL USUARIO: <input type='text' id='idusuario' name='idusuario' value=".$idUsuario['idusuario']." readonly> <br>";
        echo "ROLES A QUITAR: <br>";
        for($i=0;$i<count($listaRoles);$i++) {
            $objRol=$listaRoles[$i];
           
            echo "<input type='checkbox' name='idrol' id='idrol' value=".$objRol->getIdRol().">".$objRol->getRolDescripcion()." <br>";
            
            
        }
        
    }else{
        echo "No se encontraron Roles <br>";
    }
    */?> 
       
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html> -->