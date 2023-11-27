<?php
//$session = new Session();
$direccionMenu = $session->getDireccionMenu();
$direccionPadre = $session->getDireccionPadreMenu();
?>

<!-- ________________________________________ NAV INSEGURO _____________________________________ -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Tecno-Mates</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php
                if ($direccionMenu == "home.php") {
                    echo '<li class="nav-item active nav-underline">';
                    echo '  <a class="nav-link active " aria-current="page" href="#">Inicio</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="home.php">Inicio</a>';
                    echo '</li>';
                }

                //DROPDOWN DE PRODUCTOS
                echo '<div class="ml-auto">';

                if ($direccionMenu == "productos.php"){
                    //Caso para página actual (current)
                    echo '<div class="nav-item dropdown active nav-underline">';
                    echo '<a class="nav-link dropdown-toggle active nav-underline" href="#" id="navMenuProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    echo 'Productos';
                    echo '</a>';

                    echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    echo '<a class="dropdown-item" href="productos.php?tipo=Mates">Mates</a>';
                    echo '<a class="dropdown-item" href="productos.php?tipo=Yerbas">Yerbas</a>';
                    echo '<a class="dropdown-item" href="productos.php?tipo=Bombillas">Bombillas</a>';
                    echo '<a class="dropdown-item" href="productos.php?tipo=Termos">Termos</a>';
                    echo '<a class="dropdown-item" href="productos.php?tipo=SETS">SETS</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    //Caso para otra página (no current)
                    echo '<div class="nav-item dropdown">';
                    echo '<a class="nav-link dropdown-toggle" href="#" id="navMenuProductos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    echo 'Productos';
                    echo '</a>';

                    echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    echo '<a class="dropdown-item" href="../Home/productos.php?tipo=Mates">Mates</a>';
                    echo '<a class="dropdown-item" href="../Home/productos.php?tipo=Yerbas">Yerbas</a>';
                    echo '<a class="dropdown-item" href="../Home/productos.php?tipo=Bombillas">Bombillas</a>';
                    echo '<a class="dropdown-item" href="../Home/productos.php?tipo=Termos">Termos</a>';
                    echo '<a class="dropdown-item" href="../Home/productos.php?tipo=SETS">SETS</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    //FIN DROPDOWN DE PRODUCTOS
                }

                /*----------------------------------- */
                if ($direccionMenu == "crearCuenta.php") {
                    echo '<li class="nav-item active nav-underline">';
                    echo '  <a class="nav-link active " aria-current="page" href="#">Crear Cuenta</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="crearCuenta.php">Crear Cuenta</a>';
                    echo '</li>';
                }

                if ($direccionMenu == "login.php") {
                    echo '<li class="nav-item active nav-underline">';
                    echo '  <a class="nav-link active " aria-current="page" href="#">Iniciar Sesión</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="login.php">Iniciar Sesión</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- ________________________________________ FIN NAV INSEGURO _________________________________ -->