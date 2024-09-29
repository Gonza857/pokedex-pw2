<?php

require_once "./clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
if (!$logueado) {
    header('Location: login.php');
    exit();
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
                <option name="1" value="1">Fuego</option>
                <option name="2" value="2">Agua</option>
                <option name="3" value="3">Planta</option>
                <option name="4" value="4">Eléctrico</option>
                <option name="5" value="5">Hielo</option>
                <option name="6" value="6">Lucha</option>
                <option name="7" value="7">Volador</option>
                <option name="8" value="8">Psíquico</option>
                <option name="9" value="9">Bicho</option>
                <option name="10" value="10">Roca</option>
            </select>


            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="imagen">

            <input type="submit" value="Cargar Pokemon" class="botoncito">
        </form>
    </div>

</body>
</html>

<?php
