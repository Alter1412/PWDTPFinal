
<!-- ________________________________________ NAV INSEGURO _____________________________________ -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="home.php">Inicio</a>';
                    echo '</li>';
                }

                if ($menu == "Productos"){
                    echo '<li class="nav-item active nav-underline">';
                    echo '  <a class="nav-link active " aria-current="page" href="#">Productos</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="productos.php">Productos</a>';
                    echo '</li>';
                }

                if ($menu == "Crear Cuenta"){
                    echo '<li class="nav-item active nav-underline">';
                    echo '  <a class="nav-link active " aria-current="page" href="#">Crear Cuenta</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '  <a class="nav-link" href="crearCuenta.php">Crear Cuenta</a>';
                    echo '</li>';
                }

                if ($menu == "Iniciar Sesión"){
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
