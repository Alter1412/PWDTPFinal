<?php
class MenuRol
{

    //ATRIBUTOS
    private $objMenu; //objeto menu
    private $objRol; //objeto rol
    private $mensajeoperacion;

    //CONSTRUCTOR
    /**
     * Devuelve un objeto MenuRol
     */
    public function __construct()
    {
        $this->objMenu = null;
        $this->objRol = null;
        $this->mensajeoperacion = "";
    }

    //SETEAR
    /**
     * Setea el objeto MenuRol
     * @param Menu $objMenu
     * @param Rol $objRol
     */
    public function setear($objMenu, $objRol)
    {
        $this->setObjMenu($objMenu);
        $this->setObjRol($objRol);
    }

    //MÉTODOS GET Y SET
    public function getObjMenu()
    {
        return $this->objMenu;
    }

    public function setObjMenu($objMenu)
    {
        $this->objMenu = $objMenu;
    }

    public function getObjRol()
    {
        return $this->objRol;
    }

    public function setObjRol($objRol)
    {
        $this->objRol = $objRol;
    }

    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    //MÉTODOS PROPIOS DE LA CLASE

    /**
     * Toma el atributo donde está cargado el id del objeto y lo utiliza para realizar
     * una consulta a la base de datos con el objetivo de actualizar el resto de los atributos del objeto.
     * Retora un booleano que indica el éxito o falla de la operación
     * 
     * @return boolean
     */
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();

        $idmenu = $this->getObjMenu()->getIdMenu();
        $idrol = $this->getObjRol()->getIdRol();

        $sql = "SELECT * FROM menurol WHERE idmenu = ".$idmenu." AND idrol = ".$idrol;

        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {

                    $row = $base->Registro();

                    $objMenu = new Menu();
                    
                    if ($row['DniDuenio'] != "null"){
                        $objPersona->setNroDni($row['DniDuenio']);
                        $objPersona->cargar();
                    } else {
                        $objPersona = null;
                    }

                    $this->setear($row['idmenu'], $row['idrol']);

                }
            }
        } else {
            $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
        }
        return $resp;
    }


    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO menurol (idmenu, idrol) VALUES (" . $this->getmenu()->getIdMenu() . ", " . $this->getrol()->getIdrol() . ")";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {

                $resp = true;
            } else {
                $this->setmensajeoperacion("MenuRol->listar: " . $base->getError()[2]);
            }
        } else {
            $this->setmensajeoperacion("MenuRol->listar: " . $base->getError()[2]);
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE menurol SET idrol = " . $this->getrol()->getIdrol() . " WHERE idmenu = " . $this->getmenu()->getIdMenu() . "";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM menurol WHERE idmenu= " . $this->getmenu()->getIdMenu() . " AND idrol=" . $this->getrol()->getIdrol() . "";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("MenuRol->listar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM menurol ";
        if ($parametro != "") {
            $sql .= " WHERE " . $parametro;
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
    public function verificarPermiso($idUsuario, $enlacePag)
    {
        $resp = false;
        $base = new BaseDatos();
        /**Consulta a la base de datos si el usuario tiene el rol(permiso) para ver
         * la pagina.
         */
        $sql = "SELECT idusuario, menurol.idrol, menu.idmenu, medescripcion FROM menurol
        INNER JOIN usuariorol ON menurol.idrol = usuariorol.idrol
        INNER JOIN menu ON menu.idmenu = menurol.idmenu
        WHERE idusuario = " . $idUsuario . " AND medescripcion = '" . $enlacePag . "';";

        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($base->Registro()) {
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion("menurol->verificarPermiso: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("menurol->verificarPermiso: " . $base->getError());
        }

        return $resp;
    }
}
