<?php
include_once("../../configuracion.php");
$tituloPagina = "Compra";
$menu = "Compra";
include_once("../Estructuras/headInseguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navInseguro.php");
?>

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-2 mt-2 text-center">Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Zona de alerta -->
                        <div id="alertaSesion">
                        </div>
                        <div class="form-group">
                            <!--<label for="username">Nombre de Usuario:</label>-->
                            <input type="text" class="form-control form-control-lg mb-3" id="usuario"  name="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <!--<label for="password">Contraseña:</label>-->
                            <input type="password" class="form-control form-control-lg mb-3" id="contrasenia" name="contrasenia" placeholder="Contraseña">
                        </div>
                        <button type="submit" id="ingresar" class="btn btn-primary btn-lg w-100">INGRESAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>