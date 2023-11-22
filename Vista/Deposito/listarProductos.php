<?php
include_once "../../configuracion.php";
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
    <title>Document</title>
</head>
<body>

<?php	

 if( count($listaProductos)>0){
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
}

?>

</body>
</html>