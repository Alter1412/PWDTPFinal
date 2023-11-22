<?php
include_once "../../configuracion.php";
/**
 * desde aqui se puede:
 * Listar las compras de un usuario con sus productos
 * cancelar una compra iniciada
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
$datos = data_submitted();//recibe el id de usuario
$datos['idusuario'] = 1;//prueba. Eliminar mas tarde
$objAbmCompra = new AbmCompra();
$objAbmEstado = new AbmCompraEstado();
$listaCompra = $objAbmCompra->buscar(null);

 if( count($listaCompra)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>N° DE COMPRA</td><td>FECHA</td><td>ESTADO DE COMPRA</td><td>ITEMS  </td><td>CANCELAR</td></tr>';
    for($i=0;$i<count($listaCompra);$i++) {
        $objCompra = $listaCompra[$i];
        $bucarCompra['idcompra'] = $objCompra->getIdCompra();
        $bucarCompra['idusuario'] = $datos['idusuario'];

        //verEstructura($objCompra);
        $estadoCompra = $objAbmEstado->buscar($bucarCompra);//devuelve un array
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
                
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);
                //verEstructura($listaCompraItem);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td></tr>';
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
                            
                            </tr>';
                  }
                  echo "</table>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '</td> <td>
                <a href="action/cancelarCompra.php?idcompra='.$objCompra->getIdCompra().'">Cancelar Compra</a>
                </td>
                </tr>';
	        }elseif($tipoEstado == 'aceptada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td></tr>';
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
                          
                    
                            </tr>';
                  }
                  echo "</table><br><br><br>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '
                </tr>';

            }elseif($tipoEstado == 'enviada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td></tr>';
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
                            
                            </tr>';
                  }
                  echo "</table><br><br><br>";
                  //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
                  
              }
                
                echo '</td>';
                echo '
                </tr>';
            }elseif($tipoEstado == 'cancelada'){
                echo '<td>'.$tipoEstado.'</td>';
                echo '<td>';
                $objCompraItem = new AbmCompraItem();
                $objProducto = new AbmProducto();
                $listaCompraItem = $objCompraItem->buscar($bucarCompra);
                if( count($listaCompraItem)>0){
                  echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
                  echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td></tr>';
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