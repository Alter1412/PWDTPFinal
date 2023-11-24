<?php
class AbmCompraItem{

     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return CompraItem
     */
    private function cargarObjeto($param){
        //print_r($param);
        $obj = null;
        if( array_key_exists('idcompraitem',$param) and array_key_exists('idproducto',$param)     
          and array_key_exists('idcompra',$param) and array_key_exists('cicantidad',$param)){
            
            $objProducto = new Producto();
            $objProducto->setIdProducto($param['idproducto']);
            $objProducto->cargar();
            $objCompra = new Compra();
            $objCompra->setIdCompra($param['idcompra']);
            $objCompra->cargar();

            $obj = new CompraItem();
            $obj->setear($param['idcompraitem'],$objProducto,$objCompra,$param['cicantidad']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     *  que son claves
     * @param array $param
     * @return CompraItem
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if(isset($param['idcompraitem']) ){
            $obj = new CompraItem();
            $obj->setear($param['idcompraitem'],null,null,null);
        }
        return $obj;
    }


     /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idcompraitem']))
            $resp = true;
        return $resp;
    }


    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $unObjCompraI = $this->cargarObjeto($param);
        if ($unObjCompraI!=null && $unObjCompraI->insertar()){
            $resp = true;
        }
        return $resp;
        
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $unObjCompraI = $this->cargarObjetoConClave($param);
            if ($unObjCompraI!=null && $unObjCompraI->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificar($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $unObjCompraI = $this->cargarObjeto($param);
            if($unObjCompraI!=null && $unObjCompraI->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
   /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        
        $where = " true ";
        if ($param<>null){
            if  (isset($param['idcompraitem']))
                $where.=" and idcompraitem ='".$param['idcompraitem']."'";
            if  (isset($param['idproducto']))
                $where.=" and idproducto ='".$param['idproducto']."'";
            if  (isset($param['idcompra']))
                $where.=" and idcompra ='".$param['idcompra']."'";
            if  (isset($param['cicantidad']))
                $where.=" and cicantidad ='".$param['cicantidad']."'";
        }
        $obj = new CompraItem();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

    /**
     * Agrega Productos al carrito
     * Recibe un Array con el id del usuario y los datos del prodcuto
     */
    public function agregarProductoCarrito($datos){
        $resp = false;
        $idusuario = $datos['idusuario'];
        $objCompra = new AbmCompra();
        $busquedaCompra = $objCompra->buscarCarrito($idusuario);
        verEstructura($busquedaCompra);
        $compra = $busquedaCompra[0]; 
        $producto['idcompraitem'] = 0;
        $producto['idproducto'] = $datos['idproducto'];
        $producto['idcompra'] = $compra->getIdCompra();
        $producto['cicantidad'] = $datos['cantidad'];
        //verEstructura($producto);
        $objCompraItem = new AbmCompraItem();
        $agregar = $objCompraItem->alta($producto);
        if($agregar){
            $resp = true;
            
        }else{
            echo "Algo Fallo";
        }
        return $resp;
    }
}

?>