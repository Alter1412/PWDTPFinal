<?php
include_once "../../configuracion.php";
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
    <title>Document</title>
</head>
<body>

<?php
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
}

?>

</body>
</html>