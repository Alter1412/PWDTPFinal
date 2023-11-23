<?php
include_once("../../configuracion.php");
$tituloPagina = "Crear Cuenta";
$menu = "Crear Cuenta";
include_once("../Estructuras/headInseguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navInseguro.php");
?>

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-2 mt-2 text-center">Crear Cuenta</h4>
                </div>
                <div class="card-body">
                    <form name="formCrearCuenta" id="formCrearCuenta" method="POST" class="needs-validation">
                        <!-- Zona de alerta -->
                        <div id="alertaCrearCuenta">
                        </div>
                        <div class="form-group">
                            <label for="username">Nombre de Usuario:</label>
                            <input type="text" class="form-control form-control-lg mb-3" id="usnombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control form-control-lg mb-3" id="usmail" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">CREAR CUENTA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/validacionCrearCuenta.js"></script>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>