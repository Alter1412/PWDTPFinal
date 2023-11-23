<?php
include_once "../../configuracion.php";
$tituloPagina = "Gestionar Compras";
$menu = "Gestionar Compras";
$direccion = "Deposito";
include_once ("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

/**
 * desde aqui se puede:
 * Listar las compras
 * ver los productos de las compras
 * modificar el estado de la compra
 * eliminar productos de la compra
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Compras</title>
    <!-- Enlaces a Bootstrap CSS -->
    
</head>
<body>

<div class="container mt-4">
    <?php
    $objAbmCompra = new AbmCompra();
    $objAbmEstado = new AbmCompraEstado();
    $listaCompra = $objAbmCompra->buscar(null);

    if (count($listaCompra) > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-light">
                <tr>
                    <th scope="col">N° DE COMPRA</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">ESTADO DE COMPRA</th>
                    <th scope="col">ITEMS</th>
                    <th scope="col">OPCIONES</th>
                </tr>
              </thead>';
        echo '<tbody>';
        for ($i = 0; $i < count($listaCompra); $i++) {
            $objCompra = $listaCompra[$i];
            $idCompra['idcompra'] = $objCompra->getIdCompra();
            $estadoCompra = $objAbmEstado->buscar($idCompra);

            if (count($estadoCompra) > 0) {
                $resp = false;
                $j = 0;
                $tipoEstado = '';
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
                        <td>' . $tipoEstado . '</td>
                        <td>';

                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($idCompra);

                if (count($listaCompraItem) > 0) {
                    echo '<table class="table table-bordered">
                            <tr>
                                <th>NOMBRE PRODUCTO</th>
                                <th>DETALLE PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>OPCIONES</th>
                            </tr>';
                    for ($p = 0; $p < count($listaCompraItem); $p++) {
                        $objCompraItem = $listaCompraItem[$p];
                        $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                        $busquedaProducto = $objProducto->buscar($idProducto);
                        $producto = $busquedaProducto[0];

                        echo '<tr>
                                <td>' . $producto->getProNombre() . '</td>
                                <td> $' . $producto->getProDetalle() . '</td>
                                <td>' . $objCompraItem->getCiCantidad() . '</td>
                                <td><a href="action/eliminarArticuloCompra.php?idcompraitem=' . $objCompraItem->getIdCompraItem() . '" class="btn btn-warning" >Quitar Producto</a></td>
                              </tr>';
                    }
                    echo '</table>';
                }

                echo '</td>
                      <td>';
                
                if ($tipoEstado == 'iniciada') {
                    echo '<div class="d-block"> <a href="action/aceptarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-success"  mr-2 >Aceptar Compra</a> 
                          <a href="action/cancelarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-primary" >Cancelar Compra</a> </div>';
                } elseif ($tipoEstado == 'aceptada') {
                    echo '<div class="d-block"> <a href="action/enviarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-success"  mr-2 >Enviar Compra</a> 
                          <a href="action/cancelarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-danger" >Cancelar Compra</a> </div>';
                } elseif ($tipoEstado == 'enviada') {
                    echo '<div class="d-block"> <a href="action/cancelarCompra.php?idcompra=' . $objCompra->getIdCompra() . '" class="btn btn-danger" >Cancelar Compra</a> </div>';
                } elseif ($tipoEstado == 'cancelada') {
                    echo 'CANCELADA';
                }

                echo '</td>
                      </tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info" role="alert">No se encontraron compras.</div>';
    }
    ?>
</div>



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

<?php
/*
$objAbmCompra = new AbmCompra();
$objAbmEstado = new AbmCompraEstado();
$listaCompra = $objAbmCompra->buscar(null);

 if( count($listaCompra)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>N° DE COMPRA</td><td>FECHA</td><td>ESTADO DE COMPRA</td><td>ITEMS  </td><td> OPCIONES</td></tr>';
    for($i=0;$i<count($listaCompra);$i++) {
        $objCompra = $listaCompra[$i];
        $idCompra['idcompra'] = $objCompra->getIdCompra();
        //verEstructura($objCompra);
        $estadoCompra = $objAbmEstado->buscar($idCompra);//devuelve un array
        if(count($estadoCompra)>0){
            $resp = false;
            $j=0;
            while ($j < count($estadoCompra) && $resp == false){
                $fechafin = $estadoCompra[$j]->getCeFechaFin();
                if($fechafin == '0000-00-00 00:00:00'){
                     $tipoEstado = $estadoCompra[$j]->getObjCompraEstadoTipo()->getDescripcion();
                     $resp = true;
                }
                $j++;
            }
            echo '<tr>
              <td>'.$objCompra->getIdCompra().'</td>
              <td>'.$objCompra->getCoFecha().'</td>';
            
              if($tipoEstado == 'iniciada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                //echo "<br>ID COMPRA: ".$objCompra->getIdCompra()."<br>";
                
                $listaCompraItem = $objCompraItem->buscar($idCompra);
                //verEstructura($listaCompraItem);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td><td>OPCIONES</td></tr>';
                  for($p=0;$p<count($listaCompraItem);$p++) {
                      $objCompraItem = $listaCompraItem[$p];
                      $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                      $busquedaProducto = $objProducto->buscar($idProducto);
                      $producto = $busquedaProducto[0];//objProducto
                      //verEstructura($busquedaProducto);
                     
                      
                      
                  echo '<tr>
                            <td>'.$producto->getProNombre().'</td>
                            <td>'.$producto->getProDetalle().'</td>
                            <td>'.$objCompraItem->getCiCantidad().'</td>
                            <td><a href="action/eliminarArticuloCompra.php?idcompraitem='.$objCompraItem->getIdCompraItem().'">Quitar Producto</a> 
                    </td>
                            </tr>';
                  }
                  echo "</table><br><br><br>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '</td>';

                echo '<td><a href="action/aceptarCompra.php?idcompra='.$objCompra->getIdCompra().'">Aceptar Compra</a> 
                <a href="action/cancelarCompra.php?idcompra='.$objCompra->getIdCompra().'">Cancelar Compra</a>
                </td>
                </tr>';
	        }elseif($tipoEstado == 'aceptada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($idCompra);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td><td>OPCIONES</td></tr>';
                  for($p=0;$p<count($listaCompraItem);$p++) {
                      $objCompraItem = $listaCompraItem[$p];
                      $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                      $busquedaProducto = $objProducto->buscar($idProducto);
                      $producto = $busquedaProducto[0];//objProducto
                      //verEstructura($objProducto);
                     
                      
                      
                  echo '<tr>
                            <td>'.$producto->getProNombre().'</td>
                            <td>'.$producto->getProDetalle().'</td>
                            <td>'.$objCompraItem->getCiCantidad().'</td>
                            <td><a href="action/eliminarArticuloCompra.php?idcompraitem='.$objCompraItem->getIdCompraItem().'">Quitar Producto</a> 
                    </td>
                            </tr>';
                  }
                  echo "</table><br><br><br>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '</td>';
                echo '<td><a href="action/enviarCompra.php?idcompra='.$objCompra->getIdCompra().'">Enviar Compra</a> 
                <a href="action/cancelarCompra.php?idcompra='.$objCompra->getIdCompra().'">Cancelar Compra</a>
                </td>
                </tr>';

            }elseif($tipoEstado == 'enviada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($idCompra);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td><td>OPCIONES</td></tr>';
                  for($p=0;$p<count($listaCompraItem);$p++) {
                      $objCompraItem = $listaCompraItem[$p];
                      $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                      $busquedaProducto = $objProducto->buscar($idProducto);
                      $producto = $busquedaProducto[0];//objProducto
                      //verEstructura($objProducto);
                     
                      
                      
                  echo '<tr>
                            <td>'.$producto->getProNombre().'</td>
                            <td>'.$producto->getProDetalle().'</td>
                            <td>'.$objCompraItem->getCiCantidad().'</td>
                            <td><a href="action/eliminarArticuloCompra.php?idcompraitem='.$objCompraItem->getIdCompraItem().'">Quitar Producto</a> 
                    </td>
                            </tr>';
                  }
                  echo "</table><br><br><br>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '</td>';
                echo '<td><a href="action/cancelarCompra.php?idcompra='.$objCompra->getIdCompra().'">Cancelar Compra</a>
                </td>
                </tr>';
            }elseif($tipoEstado == 'cancelada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($idCompra);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td><td>OPCIONES</td></tr>';
                  for($p=0;$p<count($listaCompraItem);$p++) {
                      $objCompraItem = $listaCompraItem[$p];
                      $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
                      $busquedaProducto = $objProducto->buscar($idProducto);
                      $producto = $busquedaProducto[0];//objProducto
                      //verEstructura($idProducto);
                     
                      
                      
                  echo '<tr>
                            <td>'.$producto->getProNombre().'</td>
                            <td>'.$producto->getProDetalle().'</td>
                            <td>'.$objCompraItem->getCiCantidad().'</td>
                            <td>
                    </td>
                            </tr>';
                  }
                  echo "</table><br><br><br>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '</td>';
                echo' <td>CANCELADA</td>
                </tr>';
            }
        }
    
           
        }
        echo "</table><br><br><br>";
        
        
    
    //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
    
}else{
    echo "No se encontraron Productos";
} */

?>

</body>
</html> -->