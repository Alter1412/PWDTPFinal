<?php
class Session
{

    /*_ _construct(). Constructor que. Inicia la sesión.*/
    public function __construct()
    {
        $resp = true;
        if (!session_start()) {
            $resp = false;
        }
        return $resp;
    }

    /* iniciar($nombreUsuario,$psw). Actualiza las variables de sesión con los valores ingresados.
    * 
    */

    public function iniciar($nombreUsuario, $psw)
    {
        $resp = false;
        $objAbmUsuario = new AbmUsuario();
        //if ($nombreUsuario!= null && $psw != null) {
        $param['usnombre'] = $nombreUsuario;
        $param['uspass'] = $psw;
        //$param['usdeshabilitado'] = NULL; //volver a abilitar

        //Buscamos la colección de usuarios que cumplen con usuario y contraseña
        $colUsuarios = $objAbmUsuario->buscar($param);

        //Si existe al menos uno se procede...
        if (count($colUsuarios) > 0) {

            //Como existe al menos 1 lo aislamos
            $usuario = $colUsuarios[0];

            //Tomamos su id y lo guardamos como parámetro para comparar despues
            $idusuario = $usuario->getIdUsuario();
            $param2['idusuario'] = $idusuario;

            //Obtenemos toda la colección de roles que tiene ese usuario a partir
            //de los parámetros que enviemos
            $colUsuarioRol = $objAbmUsuario->buscarRoles($param2);

            //Si tiene al menos 1 rol podrá iniciar sesión en la página y podrá
            //visualizarla con la vista de su rol de mayor categoría
            if (count($colUsuarioRol) > 0) {
                $_SESSION['idusuario'] = $usuario->getIdUsuario();
                $_SESSION['usnombre'] = $usuario->getUsNombre();
                $_SESSION['usmail'] = $usuario->getUsMail();
                $_SESSION['rol'] = $colUsuarioRol[0]->getObjRol()->getIdRol();//guarda el id del rol

                for ($i = 0; $i < count($colUsuarioRol); $i++) {
                    $_SESSION['colroles'][$i] = $colUsuarioRol[$i]->getObjRol()->getIdRol();
                }

                $resp = true;
            }
        } else {
            $this->cerrar();
        }
        return $resp;
    }

    /*validar(). Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.*/
    public function validar()
    {
        $resp = false;
        if ($this->activa() && isset($_SESSION['idusuario'])) {
            $resp = true;
        }

        return $resp;
    }

    /*activa(). Devuelve true o false si la sesión está activa o no. */
    public function activa()
    {
        $resp = false;
        if (php_sapi_name() !== 'cli') {
            if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
                $resp = session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                $resp = session_id() === '' ? false : true;
            }
        }
        return  $resp;
    }

    /**Devuelve el usuario(objUsuario) logeado*/
    public function getUsuario()
    {
        $usuario = null;
        if ($this->validar()) {
            $obj = new AbmUsuario();
            $param['idusuario'] = $_SESSION['idusuario'];
            $resultado = $obj->buscar($param);
            if (count($resultado) > 0) {
                $usuario = $resultado[0];
            }
        }
        return $usuario;
    }

  /**devuelve el rol activo del usuario logeado */
  public function getRol()
  {
      $rol = null;
      if ($this->validar()){
            $rol = $_SESSION['rol'];
        }
        return $rol;
       
  }

  /**Devuelve todos los roles del usuario */
  public function getListaRoles(){
    $roles = null;
      if ($this->validar()){
            $roles = $_SESSION['colroles'];
        }
        return $roles;
  }

    /**
     * Actualiza los roles de la session
     */
    function actualizarRol()
    {
        $roles = $this->getRol();
        foreach ($roles as $rol) {
            $listaRoles[] = $rol->getIdRol();
        }
        unset($_SESSION['rol']);
        $_SESSION['rol'] = $listaRoles;
    }

    /**
     * Revisa si el usuario tiene el rol (permiso) para entrar a una página
     * @return boolean
     */
    public function tienePermiso()
    {
        $resp = false;

        $rutaArchivo = $_SERVER['PHP_SELF']; //retorna un string con la $rutaArchivo del archivo
        $rutaArchivo = explode("/", $rutaArchivo); //separa una sentencia por una letra o simbolo dado y retorna un array
        $stringRuta = "../";
        $stringRuta .= $rutaArchivo[count($rutaArchivo) - 2] . "/";
        $stringRuta .= $rutaArchivo[count($rutaArchivo) - 1];

        $objMenuRol = new MenuRol();
        if ($objMenuRol->verificarPermiso($_SESSION["idusuario"], $stringRuta)) {
            $resp = true;
        }

        return $resp;
    }

    /**cierra la sesion actual */
    public function cerrar()
    {
        $resp = true;
        session_destroy();
        return $resp;
    }
}
