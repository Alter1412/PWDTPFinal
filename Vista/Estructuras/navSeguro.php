<?php
//$session = new Session();
$rolActivo = $session->getRol();//id del rol
$idUsuario = $session->getUsuario()->getIdUsuario();//idusuario
$colRoles = $session->getListaRoles();//$_SESSION['colroles'][$i]= id rol
$resp = false;
$j=0;
$menu = ""; //aca se almacena texto con html 
$objRol = new AbmRol();
$colRoles = $session->getListaRoles();
while($j<count($colRoles) && $resp == false){
    if($colRoles[$j]==$rolActivo){
        $resp = true;
    }
    $j++;
}
if($resp){ 
 
    for ($i = 0; $i < 1; $i++){
        $id['id'] = $rolActivo;
        $permisos = $objRol->buscarPermisos($id);//devuelve un array de OBJ MenuRol
        //Los MenuRol guardan un objMenu y un objRol
        if($permisos != null){
            $idrol['idrol'] = $id['id'];
            $rol = $objRol->buscar($idrol);
            $rolDesc = $rol[0]->getRolDescripcion();
            $menu = "ROL: ".$rolDesc."<br>";
            foreach ($permisos as $permiso){
                $menu .= "RUTA MENU: ".$permiso->getmenu()->getMeDescripcion().
                         "<br>NOMBRE MENU: ".$permiso->getmenu()->getMeNombre()."<br>";
            }
    
        }
        echo $menu;
    }
}
?>

<!-- ________________________________________ NAV SEGURO _______________________________________ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TECNO-MATES</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <?php

        $objMenuRol = new AbmMenuRol;
        $colMenus = $objMenuRol->obtenerColMenus($rol);

        ?>
        </ul>
    </div>
</nav>

<!-- ________________________________________ FIN NAV SEGURO ___________________________________ -->
