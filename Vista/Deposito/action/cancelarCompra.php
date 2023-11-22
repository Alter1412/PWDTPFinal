<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
verEstructura($datos);
$objCompra = new AbmCompra();
$arayCompra = $objCompra->buscar($datos);//array
$compra = $arayCompra[0];//objCompra

    $objEstado = new AbmCompraEstado();
    //parametros de busqueda
    $param['idcompra'] = $compra->getIdCompra();
    //$param['idcompraestadotipo'] = 1;
    $param['cefechafin'] = null;
    $exito = $objEstado->buscar($param);

    if($exito){
        //modifico el estado inicial colocandole fecha fin
        $estado = $exito[0];
        $param['idcompraestado'] = $estado->getIdCompraEstado();
        $param['idcompra'] = $estado->getObjCompra()->getIdCompra();
        $param['idcompraestadotipo'] = $estado->getObjCompraEstadoTipo()->getIdCompraEstadoTipo();
        $param['cefechaini'] = $estado->getCeFechaIni();
        $param['cefechafin'] = date('Y-m-d H:i:s');
        $objEstado->modificar($param);

        //creo el estado cancelada con fecha de inicio
        $cancelado = new AbmCompraEstado();
        $param['idcompraestado'] = 0;
        $param['idcompra'] = $compra->getIdCompra();
        $param['idcompraestadotipo'] = 4;
        $param['cefechaini'] = date('Y-m-d H:i:s');
        $param['cefechafin'] = null;
        $exito = $cancelado->alta($param);
       
        echo "cancelacion realizada";
    }else{
        echo "Algo fallo";
    }




?>