<?php
include_once("../../configuracion.php");

$objSession = new Session();

//Valido logueo correcto y ademas que tenga permiso(rol)
if($objSession->validar()){
    if(array_key_exists('rol', $_SESSION)){
        $rol = $_SESSION['rol'];
    } else {
        $rol = null;
    }
} else {
    $rol = null;
}

?>

<!DOCTYPE html>
<html lang="es">

<!-- ________________________________________ HEAD INSEGURO ____________________________________ -->
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $tituloPagina ?></title>

    <!-- link a librería de bootstrap -->
    <!--<script src="../../Util/librerias/bootstrap/bootstrap.bundle.min.js"></script>-->
    <link rel="stylesheet" href="../../Util/librerias/bootstrap/bootstrap.min.css">

    <!-- Recomendado por Chat GPT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../Archivos/Imagenes/mate.png">

    <!-- link a librería de jquery -->
    <script src="../../Util/librerias/jquery/jquery-3.7.1.min.js"></script>
    <script src="../../Util/librerias/jquery/jquery.validate.min.js"></script>
    <script src="../../Util/librerias/jquery/messages_es_PE.js"></script>

    <!-- link a librería JS para encriptar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>

    <!-- link a css propio -->
    <link rel="stylesheet" href="../css/estilos.css">

    <!-- link a js propio -->
    <!--<script src="../estructura/js/validaBoostrap.js"></script>-->

    <!-- link a iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<!-- ________________________________________ FIN HEAD INSEGURO ________________________________ -->

<!-- ________________________________________ INICIO BODY ______________________________________ -->
<body>
