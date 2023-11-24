<?php
include_once("../../configuracion.php");
$tituloPagina = "Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
?>


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
        echo "<p class='card-text'>Stock: " . $listaProd[$i]->getProCantstock() . "</p>";
    
       echo "<a href='agregarProductoAlCarrito.php?idproducto=".$listaProd[$i]->getIdProducto()."'  class='btn btn-primary' >Agregar al carrito</a></button>";

   
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