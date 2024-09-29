<?php

require_once "./clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
if (!$logueado) {
    header('Location: login.php');
    exit();
}

$directorio = 'tipos'; // Cambia esto a la ruta de tu carpeta
$archivos = scandir($directorio);

$options = []; // Array para almacenar los nombres de las imágenes sin extensiones

foreach ($archivos as $archivo) {
    // Filtrar archivos que no son directorios y que tienen una extensión de imagen
    if ($archivo !== '.' && $archivo !== '..') {
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
        // Aquí puedes filtrar por tipo de imagen si lo deseas
        if (in_array(strtolower($extension), ["svg"])) {
            $nombreSinExtension = pathinfo($archivo, PATHINFO_FILENAME); // Obtener solo el nombre sin extensión
            $options[] = $nombreSinExtension; // Agregar el nombre al array
        }
    }
}


?>

    <!doctype html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Agregar Nuevo Pokemon</title>
        <link rel="stylesheet" href="stylesheets/agregarPoke.css">
    </head>
    <body>
    <h1>Poke - Agrego</h1>
    <div class="contFormulario">
        <form action="procesos/procesar-agregar.php" method="post" enctype="multipart/form-data">
            <label for="codigo">Codigo Del Pokemon</label>
            <input type="number" id="codigo" name="codigo">

            <label for="nombre">Nombre Del Pokemon</label>
            <input type="text" id="nombre" name="nombre">

            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" id="descripcion"></textarea>

            <select name="tipo">
                <?php foreach ($options as $indice => $nombre) : ?>
                    <option value="<?= $indice ?>"><?= ucfirst($nombre) ?></option>
                <?php endforeach; ?>
            </select>


            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="imagen">

            <input type="submit" value="Cargar Pokemon" class="botoncito">
        </form>
    </div>

    </body>
    </html>

<?php
