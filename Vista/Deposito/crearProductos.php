<?php
include_once ("../../configuracion.php");
//la tabla producto tiene autoincrement
?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action/agregarProducto.php">
        Nombre Producto: <input type="text" name="pronombre" id="pronombre"><br>
        Precio: <input type="text" name="prodetalle" id="prodetalle"><br>
        STOCK: <input type="text" name="procantstock" id="procantstock"><br>
        Tipo: <input type="text" name="tipo" id="tipo"><br>
        Imagen: <input type="text" name="imagenproducto" id="imagenproducto"><br>
        <input type="submit" value="Test">
    </form>
</body>
</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="action/agregarProducto.php">
                <div class="form-group">
                    <label for="pronombre">Nombre Producto:</label>
                    <input type="text" class="form-control" name="pronombre" id="pronombre">
                </div>

                <div class="form-group">
                    <label for="prodetalle">Precio:</label>
                    <input type="text" class="form-control" name="prodetalle" id="prodetalle">
                </div>

                <div class="form-group">
                    <label for="procantstock">STOCK:</label>
                    <input type="text" class="form-control" name="procantstock" id="procantstock">
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" class="form-control" name="tipo" id="tipo">
                </div>

                <div class="form-group">
                    <label for="imagenproducto">Imagen:</label>
                    <input type="text" class="form-control" name="imagenproducto" id="imagenproducto">
                </div>

                <button type="submit" class="btn btn-primary">Test</button>
            </form>
        </div>
    </div>
</div>

<!-- Agrega la referencia a Bootstrap JS y Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>