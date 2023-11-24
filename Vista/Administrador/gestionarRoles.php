<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../configuracion.php');
$tituloPagina = "Gestionar Roles";
include_once ("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$rol = new AbmRol();
$listaRoles = $rol->buscar(null);
?>
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<div class="card-header bg-dark text-white">
                <h4 class="mb-2 mt-2 text-center">Gestionar Roles</h4>
        </div>
        <div class="card-body">
            <?php
            if (count($listaRoles) > 0) {
                echo "<table class='table table-bordered'>";
                echo '<thead class="thead-dark"><tr><th>ID ROL</th><th>DESCRIPCION</th><th>OPCIONES</th></tr></thead>';
                echo '<tbody>';
                for ($i = 0; $i < count($listaRoles); $i++) {
                    $objRol = $listaRoles[$i];
                    echo '<tr><td>' . $objRol->getIdRol() . '</td><td>' . $objRol->getRolDescripcion() . '</td><td><a href="action/eliminarRol.php?idrol=' . $objRol->getIdRol() . '" class="btn btn-danger btn-sm">Eliminar</a></td></tr>';
                }
                echo '</tbody></table>';
            } else {
                echo "<p>No se encontraron Roles</p>";
            }
            ?>

            <form action="action/altaRol.php" method="post">
                <input type="text" name="idrol" id="idrol" hidden value="0">

                <div class="form-group">
                    <label for="rodescripcion">NOMBRE DE ROL NUEVO:</label>
                    <input type="text" class="form-control" id="rodescripcion" name="rodescripcion"><br>
                </div>

                <button type="submit" class="btn btn-primary w-100">CREAR ROL</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

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

    <?php /*
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
    */?>
    <form action="action/altaRol.php" method="post">
        <input type="text" name="idrol" id="idrol" hidden value=0>

        DESCRIPCION DEL ROL: <input type="text" id="rodescripcion" name="rodescripcion" > <br>
        
       
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html> -->