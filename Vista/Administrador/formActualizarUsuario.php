<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 //CONTRASEÑA: <input type="text" name="uspass" id="uspass" value='<?php echo $objUsuario->getUsPass() ? >'> <br>
include_once ('../../configuracion.php');
$tituloPagina = "Gestionar Usuarios";
$menu = "Gestionar Usuarios";
$direccion = " 	Administrador";
include_once ("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
$datos = data_submitted();
$abmUsuario = new AbmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <!-- Enlaces a Bootstrap CSS -->
    
</head>
<body>

<div class="container mt-4">
    <form action="action/actualizarUsuarios.php" method="post">
        <div class="form-group">
            <label for="idusuario">ID:</label>
            <input type="text" class="form-control" id="idusuario" name="idusuario" value='<?php echo $objUsuario->getIdUsuario() ?>' readonly>
        </div>
        <div class="form-group">
            <label for="usnombre">NOMBRE:</label>
            <input type="text" class="form-control" id="usnombre" name="usnombre" value='<?php echo $objUsuario->getUsNombre() ?>'>
        </div>
        <div class="form-group">
            <label for="uspass">CONTRASEÑA:</label>
            <input type="text" class="form-control" id="uspass" name="uspass" value='<?php echo $objUsuario->getUsPass() ?>' readonly>
        </div>
        <div class="form-group">
            <label for="usmail">E-MAIL:</label>
            <input type="text" class="form-control" id="usmail" name="usmail" value='<?php echo $objUsuario->getUsMail() ?>'>
        </div>
        <div class="form-group">
            <label for="usdeshabilitado">HABILITAR:</label>
            <input type="text" class="form-control" id="usdeshabilitado" name="usdeshabilitado" value='<?php echo $objUsuario->getUsDeshabilitado() ?>'>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<br>
<?php
include_once("../Estructuras/footer.php");
?>

</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action/actualizarUsuarios.php" method="post">
        ID: <input type="text" id="idusuario" name="idusuario" value='<?php //echo $objUsuario->getIdUsuario() ?>' readonly> <br>
        NOMBRE: <input type="text" id="usnombre" name="usnombre" value='<?php //echo $objUsuario->getUsNombre() ?>'> <br>
        CONTRASEÑA: <input type="text" name="uspass" id="uspass" value='<?php //echo $objUsuario->getUsPass() ?>' readonly> <br>
        E-MAIL: <input type="text" id="usmail" name="usmail" value='<?php //echo $objUsuario->getUsMail() ?>'> <br>
        HABILITAR: <input type="text" id="usdeshabilitado" name="usdeshabilitado" value='<?php //echo $objUsuario->getUsDeshabilitado() ?>'> <br>
        <input type="submit"  value="Actualizar"> 
    </form>
</body>
</html> -->