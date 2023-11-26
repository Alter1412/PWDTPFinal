<?php
include_once("../../configuracion.php");
$tituloPagina = "Inicio";
include_once("../Estructuras/headInseguro.php");
include_once("../Estructuras/banner.php");

if ($rol != null){
    include_once("../Estructuras/navSeguro.php");
} else {
    include_once("../Estructuras/navInseguro.php");
}

?>

<!-- ________________________________________ INICIO CONTENIDO _________________________________ -->
<div class="container mt-5 mb-5">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="2000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/ContenidoSitio/inicio1.png" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="../img/ContenidoSitio/inicio2.png" class="d-block w-100" alt="Imagen 2">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <!--<span class="sr-only">Anterior</span>-->
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <!--<span class="sr-only">Siguiente</span>-->
        </a>
    </div>
</div>
<!-- ________________________________________ FIN CONTENIDO ____________________________________ -->

<?php
include_once("../Estructuras/footer.php");
?>