<?php
//$session = new Session();

$nombreUsuario = $_SESSION['usnombre'];

$rolActivo = $session->getRol();//ID del ROL ACTIVO
$idUsuario = $session->getUsuario()->getIdUsuario();//ID de USUARIO
$colRoles = $session->getListaRoles();//$_SESSION['colroles'][$i]= id rol

/*
$resp = false;
$j=0;
$menu = ""; //aca se almacena texto con html 
$objRol = new AbmRol();

while( $j < count($colRoles) && $resp == false){//Busca en la colecciones de roles el rol activo, para que?
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
*/

//Algoritmo para buscar La colección de menus:
$rolActivo = $session->getRol();//ID del ROL ACTIVO
$arreglo['idrol'] = $rolActivo;//Armo los parámetros de busqueda
$objMenuRol = new AbmMenuRol;
$colMenuRol = $objMenuRol->buscar($arreglo);//Consigo la colección de AbmMenuRol

for ($i=0; $i < count($colMenuRol); $i++){//Consigo la colección de Menus
    $colMenu[] = $colMenuRol[$i]->getMenu;
}

?>

<!-- ________________________________________ NAV SEGURO _______________________________________ -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!--<a class="navbar-brand" href="#">TECNO-MATES</a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <?php

            if ($menu == "Inicio"){
                echo '<li class="nav-item active nav-underline">';
                echo '  <a class="nav-link active " aria-current="page" href="#">Inicio</a>';
                echo '</li>';
            } else {
                if ($ruta == "Home"){
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="home.php">Inicio</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="../Home/home.php">Inicio</a>';
                    echo '</li>';
                }

            }

            for ($i=0; $i < count($colMenu); $i++){

                $menombre = $colMenu[$i]->getMeNombre();
                $medescripcion = $colMenu[$i]->getMeDescripcion();

                $padreMenu = $colMenun[$i]->getMenuPadre();
                $nombrePadre = $padreMenu->getMeNombre();
                $medescripcionpadre = $padreMenu->getMeDescripcion();
                
                if ($menu == $menombre){
                    echo '<li class="nav-item active nav-underline">';
                    echo '  <a class="nav-link active " aria-current="page" href="#">Inicio</a>';
                    echo '</li>';
                } else {
                    if ($ruta == $nombrePadre){
                        echo '<li class="nav-item">';
                        echo '  <a class="nav-link" href='.$medescripcion.'>Inicio</a>';
                        echo '</li>';
                    } else {
                        echo '<li class="nav-item">';
                        echo '  <a class="nav-link" href='.$medescripcionpadre.$medescripcion.'>Inicio</a>';
                        echo '</li>';
                    }
    
                }

            }

            ?>
                <div class="ml-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $nombreUsuario ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Mi Perfil</a>
                            <a class="dropdown-item" href="#">Cambiar Rol</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../opcionesDeCuenta/cerrarSesion.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>

<!-- ________________________________________ FIN NAV SEGURO ___________________________________ -->
