<?php
include_once("../../configuracion.php");

$tituloPagina = "Mi Perfil";
$menu = "Mi Perfil";
$direccion = "opcionesDeCuenta";

include_once("../Estructuras/headInseguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
?>
<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Perfil de Usuario
                </div>
                <div class="card-body">
                    <!-- Datos actuales del perfil -->
                    <div class="form-group">
                        <label for="username">Nombre de Usuario:</label>
                        <input type="text" class="form-control" id="username" value="UsuarioEjemplo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" value="usuario@example.com" readonly>
                    </div>

                    <!-- Formulario para actualizar datos del perfil -->
                    <form id="updateProfileForm">
                        <div class="form-group">
                            <label for="newUsername">Nuevo Nombre de Usuario:</label>
                            <input type="text" class="form-control" id="newUsername" placeholder="Nuevo nombre de usuario">
                        </div>
                        <div class="form-group">
                            <label for="newEmail">Nuevo Correo Electrónico:</label>
                            <input type="email" class="form-control" id="newEmail" placeholder="Nuevo correo electrónico">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                    </form>

                    <!-- Formulario para cambiar la contraseña -->
                    <form id="changePasswordForm" class="mt-3">
                        <div class="form-group">
                            <label for="currentPassword">Contraseña Actual:</label>
                            <input type="password" class="form-control" id="currentPassword" placeholder="Contraseña actual">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nueva Contraseña:</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="Nueva contraseña">
                        </div>
                        <button type="submit" class="btn btn-danger">Cambiar Contraseña</button>
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