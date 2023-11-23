<?php
include_once("../../configuracion.php");

$tituloPagina = "Cambiar Rol";
$menu = "Opciones Cuenta";
$direccion = "opcionesDeCuenta";

include_once("../Estructuras/headSeguro.php");

$colRoles = $session->getListaRoles();

if(count($colRoles) == 1){
    header("Location: ../Home/home.php");
}

include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
?>
<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion1" value="opcion1">
                    <label class="form-check-label" for="opcion1">
                        Opción 1
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion2" value="opcion2">
                    <label class="form-check-label" for="opcion2">
                        Opción 2
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion3" value="opcion3">
                    <label class="form-check-label" for="opcion3">
                        Opción 3
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>