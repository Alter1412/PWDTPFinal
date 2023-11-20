<?php
include_once ('../../configuracion.php');
$session = new Session();//obtengo los del usuario datos desde aqui
$controlCompra = new AbmCompra();
$controlCompraEstado = new AbmCompraEstado();
$controlCompraItem = new AbmCompraItem();
$controlProducto = new AbmProducto();
/** Hacer las pruebas con un usuario estatico */
$idUsuario['idusuario'] = $session->getUsuario()->getIdUsuario();
$hayComprasCliente = $controlCompra->buscar($idUsuario);

$existeCarrito = false;

if(count($hayComprasCliente)==0){//si no hay carrito, lo crea
    $param['idcompra'] = 0;
    $param['cofecha'] = date('Y-m-d H:i:s');
    $param['idusuario'] = $idUsuario;
    $controlCompra->crearCarrito($param);
}else{//si no
    $posibleCompraCarrito = $hayComprasCliente[count($hayComprasCliente)-1];
    $buscarIdCompra['idcompra'] = $posibleCompraCarrito->getIdCompra();
    if(count($controlCompraEstado->buscar($buscarIdCompra))===1){//si ya hay un carrito existente
        $existeCarrito = true;
        $objCompra = $posibleCompraCarrito;
    }else{//si no se crea uno nuevo
        $param['idcompra'] = 0;
        $param['cofecha'] = date('Y-m-d H:i:s');
        $param['idusuario'] = $idUsuario;
        $controlCompra->crearCarrito($param);
    }

}


?>