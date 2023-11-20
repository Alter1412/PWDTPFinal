<?php
class MenuRol {
    private $menu;//objeto menu
    private $rol;//objeto rol
    private $mensajeoperacion;
    

    public function getmenu()
    {
        return $this->menu;
    }

    public function setmenu($menu)
    {
        $this->menu = $menu;
    }

    public function getrol()
    {
        return $this->rol;
    }

    public function setrol($rol)
    {
        $this->rol = $rol;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    public function __construct(){
         $this->menu = "";
         $this->rol = "";
         $this->mensajeoperacion ="";
        
     }

     public function setear($menu, $rol)    {
        $this->setmenu($menu);
        $this->setrol($rol);
    }
    
    
    public function cargar() {
      $resp = false;
      $base = new BaseDatos();
      $sql = "SELECT * FROM menurol WHERE objmenu = ".$this->getmenu()."";
      if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
          if ($res > 0) {
            $row = $base->Registro();
            $this->setear($row['idmenu'], $row['idrol']);
          }
        }
      } else {
        $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
      }
      return $resp;
    }

    
    public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO menurol (idmenu, idrol) VALUES (".$this->getmenu()->getIdMenu().", ".$this->getrol()->getIdrol().")";
    
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
    
            $resp = true;
          } else {
            $this->setmensajeoperacion("MenuRol->listar: ".$base->getError()[2]);
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError()[2]);
        }
        return $resp;
      }
    
      public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE menurol SET idrol = ".$this->getrol()->getIdrol()." WHERE idmenu = ".$this->getmenu()->getIdMenu()."";
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
            $resp = true;
          } else {
            $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM menurol WHERE idmenu= ".$this->getmenu()->getIdMenu()." AND idrol=".$this->getrol()->getIdrol()."";
        if ($base->Iniciar()) {
          if ($base->Ejecutar($sql)) {
            return true;
          } else {
            $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
          }
        } else {
          $this->setmensajeoperacion("MenuRol->listar: ".$base->getError());
        }
        return $resp;
      }
    
      public static function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM menurol ";
        if ($parametro != "") {
          $sql .= " WHERE ".$parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
          if ($res > 0) {
    
            while ($row = $base->Registro()) {
              $obj = new MenuRol();
    
              $objMenu = new Menu();
              $objMenu->setIdmenu($row['idmenu']);
              $objMenu->cargar();
    
              $objRol = new Rol();
              $objRol->setIdrol($row['idrol']);
              $objRol->cargar();
    
              $obj->setear($objMenu, $objRol);
    
              array_push($arreglo, $obj);
            }
          }
        }
    
        return $arreglo;
      }

      /**
       * Verifica si tiene permisos para ver la pagina
       * @param int $idUsuario
       * @param $enlacePag
       * @return boolean
       */
      public function verificarPermiso($idUsuario, $enlacePag){
        $resp = false;
        $base = new BaseDatos();
        /**Consulta a la base de datos si el usuario tiene el rol(permiso) para ver
         * la pagina.
         */
        $sql = "SELECT idusuario, menurol.idrol, menu.idmenu, medescripcion FROM menurol
        INNER JOIN usuariorol ON menurol.idrol = usuariorol.idrol
        INNER JOIN menu ON menu.idmenu = menurol.idmenu
        WHERE idusuario = ". $idUsuario ." AND medescripcion = '". $enlacePag ."';";

        if($base->Iniciar()){
          if($base->Ejecutar($sql)){
              if($base->Registro()){
                  $resp= true;
              }
          }else{$this->setMensajeOperacion("menurol->verificarPermiso: ".$base->getError());}
        }else{$this->setMensajeOperacion("menurol->verificarPermiso: ".$base->getError());}

        return $resp;
      }
}
?>