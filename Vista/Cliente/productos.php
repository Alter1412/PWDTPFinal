<?php
include_once("../../configuracion.php");
$tituloPagina = "Productos";
$menu = "Productos";
$direccion = " 	Cliente";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
?>

<!-- ________________________________________ PRUEBA TABLA _____________________________________ -->
<div class="container">
    <?php
    /*$objAbmProducto = new AbmProducto();
    $listaProductos = $objAbmProducto->buscar(null);

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
                <td><a href="agregarProductoAlCarrito.php?idproducto='.$objProducto->getIdProducto().'">Agregar al carrito</a> 
        </td>
                </tr>';
        }
        echo "</table><br><br><br>";
        //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
        
    }else{
        echo "No se encontraron Productos";
    }
    */?>
</div>
<!-- ________________________________________ FIN PRUEBA TABLA _________________________________ -->

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="container">
    <?php
    $objProduc = new AbmProducto();

    // Obtener los elementos de navegación
    // Obtiene el nombre del textO DEL MENU SELECCIONADO

    // $tipoDeProduc = $texto;
    $param['tipo'] = "Mates";

    $listaProd = $objProduc->buscar($param);
    echo "<div class='row '>";

    for ($i = 0; $i < count($listaProd); $i++) {
        echo "<div class='col'>";
        echo "<div class='p-3 d-flex justify-content-center align-items-center'>";
        echo "<div class='card text-center sombraCarta' style='width: 17rem;'>";
        echo "<img class='card-img-top' style='height: 16rem;' src='" . $listaProd[$i]->getImagenProducto() . "' alt='" . $listaProd[$i]->getProNombre() . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $listaProd[$i]->getProNombre() . "</h5>";
        echo "<p class='card-text'>Precio: $" . $listaProd[$i]->getProDetalle() . "</p>";
    ?>
        <button type='button' class='btn' onclick='enviar( <?php echo $listaProd[$i]->getIdProducto() ?>)' data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bi bi-cart-plus-fill text-start'></i></button>

    <?php
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    //  <i class='bi bi-cart-plus-fill text-start'></i>
    echo "</div>";

    ?>
</div>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>