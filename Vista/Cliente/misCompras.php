<?php
include_once "../../configuracion.php";
$tituloPagina = "Mis Compras";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

/**
 * desde aqui se puede:
 * Listar las compras de un usuario con sus productos
 * cancelar una compra iniciada
 */
?>

<div class="container mt-4">
    <?php
    

     // recibe el id de usuario
    $datos['idusuario'] = $_SESSION['idusuario']; 
    $objAbmCompra = new AbmCompra();
    $objAbmEstado = new AbmCompraEstado();
    $listaCompra = $objAbmCompra->buscar($datos);

    if (count($listaCompra) > 0) {
        echo "<table class='table table-bordered'>";
        echo '<thead class="thead-dark"><tr><th>ID DE COMPRA</th><th>FECHA</th><th>ESTADO DE COMPRA</th><th>ITEMS</th><th>CANCELAR</th></tr></thead>';
        echo '<tbody>';

        for ($i = 0; $i < count($listaCompra); $i++) {
            $objCompra = $listaCompra[$i];
            $bucarCompra['idcompra'] = $objCompra->getIdCompra();
            $bucarCompra['idusuario'] = $datos['idusuario'];

            $estadoCompra = $objAbmEstado->buscar($bucarCompra);
            if (count($estadoCompra) > 0) {
                $resp = false;
                $j = 0;

                while ($j < count($estadoCompra) && $resp == false) {
                    $fechafin = $estadoCompra[$j]->getCeFechaFin();
                    if ($fechafin == '0000-00-00 00:00:00') {
                        $tipoEstado = $estadoCompra[$j]->getObjCompraEstadoTipo()->getDescripcion();
                        $resp = true;
                    }
                    $j++;
                }

                echo '<tr>
                        <td>' . $objCompra->getIdCompra() . '</td>
                        <td>' . $objCompra->getCoFecha() . '</td>
                        <td><b>' . $tipoEstado . '</b></td>
                        <td>';

                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);

                if (count($listaCompraItem) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo '<tr><td>IMAGEN</td><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td></tr>';

                    for ($p = 0; $p < count($listaCompraItem); $p++) {
                        $objCompraItem = $listaCompraItem[$p];
                        $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                        $busquedaProducto = $objProducto->buscar($idProducto);
                        $producto = $busquedaProducto[0];

                        echo '<tr>
                                <td><img src=' . $producto->getImagenProducto() . ' width="100px"></td>
                                <td>' . $producto->getProNombre() . '</td>
                                <td>' . $producto->getProDetalle() . '</td>
                                <td>' . $objCompraItem->getCiCantidad() . '</td>
                            </tr>';
                    }

                    echo "</table>";
                }
                if($tipoEstado == 'iniciada'){
                    echo '</td>
                            <td>
                                <a href="action/cancelarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-danger">Cancelar Compra</a>
                            </td>
                        </tr>';
                }
            }
        }

        echo '</tbody></table><br><br><br>';

    } else {
        echo "<p>No se encontraron Compras</p>";
    }
    ?>

</div>

<?php
include_once("../Estructuras/footer.php");
?>


