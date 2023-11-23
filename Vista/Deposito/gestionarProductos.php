<?php
include_once "../../configuracion.php";
$tituloPagina = "Gestionar Productos";
$menu = "Gestionar Productos";
$direccion = "Deposito";
include_once ("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
$objAbmProducto = new AbmProducto();
/**
 * Desde aque se puede ver la lista de productos y modificarla
 */

$listaProductos = $objAbmProducto->buscar(null);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!-- Enlaces a Bootstrap CSS -->
   
</head>
<body>

<div class="container mt-4">
    <?php
    if (count($listaProductos) > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">
                <tr>
                    <th scope="col">NOMBRE PRODUCTO</th>
                    <th scope="col">DETALLE PRODUCTO</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">OPCIONES</th>
                </tr>
              </thead>';
        echo '<tbody>';
        for ($i = 0; $i < count($listaProductos); $i++) {
            $objProducto = $listaProductos[$i];
            
            echo '<tr>
                    <td>' . $objProducto->getProNombre() . '</td>
                    <td> $' . $objProducto->getProDetalle() . '</td>
                    <td>' . $objProducto->getProCantstock() . '</td>
                    <td><a href="modificarProductos.php?idproducto=' . $objProducto->getIdProducto() . '" class="btn btn-primary">Modificar Producto</a></td>
                  </tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info" role="alert">No se encontraron productos.</div>';
    }
    ?>
</div>



</body>
</html>
<?php
include_once("../Estructuras/footer.php");
?>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php	

 /*if( count($listaProductos)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>STOCK</td><td>OPCIONES</td></tr>';
    for($i=0;$i<count($listaProductos);$i++) {
        $objProducto = $listaProductos[$i];
        //verEstructura($objProducto);
       
        
        
    echo '<tr>
              <td>'.$objProducto->getProNombre().'</td>
              <td>'.$objProducto->getProDetalle().'</td>
              <td>'.$objProducto->getProCantstock().'</td>
              <td><a href="modificarProductos.php?idproducto='.$objProducto->getIdProducto().'">Modificar Producto</a> 
      </td>
              </tr>';
	}
    echo "</table><br><br><br>";
    //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
    
}else{
    echo "No se encontraron Productos";
}*/

?>

</body>
</html> -->