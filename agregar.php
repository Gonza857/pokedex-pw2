<?php

require_once "./clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
$mensajeDeError = $_SESSION["error-mensaje"] ?? false;

if (!$logueado) {
    header('Location: login.php');
    exit();
}

$directorio = 'tipos';
$archivos = scandir($directorio);

$options = [];

foreach ($archivos as $archivo) {
    if ($archivo !== '.' && $archivo !== '..') {
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        if (in_array(strtolower($extension), ["svg"])) {
            $nombreSinExtension = pathinfo($archivo, PATHINFO_FILENAME);
            $options[] = $nombreSinExtension;
        }
    }
}


?>

    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include_once("./components/fuentes.html"); ?>
        <?php include_once("./components/bootstrap-and-general-styles.html") ?>
        <!--  Estilos del detalle  -->
        <title>Agregar Nuevo Pokemon</title>
        <link rel="stylesheet" href="stylesheets/agregar.css">
    </head>
    <body>
    <main class="col-12 col-sm-10 p-4 mx-auto col-md-8 col-lg-6 col-xl-4 contFormulario border mt-4">
        <form
                action="procesos/procesar-agregar.php"
                method="post"
                enctype="multipart/form-data"
                class="gap-1">
            <h1 class="agregarTitle">Agregar pokemón</h1>
            <p class="text-danger"><?= $mensajeDeError ?></p>
            <label for="codigo">Código Del Pokemon</label>
            <input type="number" id="codigo" name="codigo">
            <label for="nombre">Nombre Del Pokemón</label>
            <input type="text" id="nombre" name="nombre">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion"></textarea>
            <label for="tipo">Tipo</label>
            <select name="tipo">
                <?php foreach ($options as $indice => $nombre) : ?>
                    <option value="<?= $indice ?>"><?= ucfirst($nombre) ?></option>
                <?php endforeach; ?>
            </select>
            <label for="imagen">Imágen</label>
            <input type="file" id="imagen" name="imagen" class="imagen col-12">
            <button type="submit" class="fw-semibold fs-6">Cargar pokemón</button>
        </form>
    </main>

    </body>
    </html>

<?php
