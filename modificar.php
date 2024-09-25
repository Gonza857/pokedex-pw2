<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedexphp") or die ("error en conexion");

$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$query = mysqli_query($conexion, "SELECT * FROM pokemon WHERE ID_BASE = " . $existeBuscado);

$fila = mysqli_fetch_assoc($query);

$poke = [
    "id_base" => $fila["ID_BASE"],
    "codigo" => $fila["CODIGO"],
    "nombre" => $fila["NOMBRE"],
    "descripcion" => $fila["DESCRIPCION"],
    "tipos" => json_encode($fila["TIPO_POKEMON"]),
    "imagen" => $fila["IMAGEN"],
];

$areAllParamettersSetted =
    isset($_POST["codigo"])
    && isset($_POST["nombre"])
    && isset($_POST["descripcion"])
    && isset($_POST["tipos"]);


if ($areAllParamettersSetted) {
    echo json_encode($_POST["tipos"]);
}



?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del modificar  -->
    <link rel="stylesheet" href="stylesheets/modificar.css">
    <title>Modificar Pokemón</title>
</head>
<body>
<?php require("./components/header.php") ?>
<main class="col-12 pt-4">
    <h1 class="text-white"><?= $areAllParamettersSetted ? "todo puesto pa" : "sol :D"?></h1>
    <div class="mx-auto">
        <form method="post" action="modificar.php?id=4" enctype="multipart/form-data" class="d-flex flex-column gap-2 col-4 mx-auto border rounded-4 p-4">
            <h3 class="text-center text-white">Modificar Pokemon: <?= $poke["nombre"] ?></h3>
            <div class="d-flex flex-column gap-1 text-white">
                <label for="codigo">Código</label>
                <input class="styledInput rounded-3" name="codigo" value="<?= $poke["codigo"] ?>"/>
            </div>
            <div class="d-flex flex-column gap-1 text-white">
                <label for="nombre">Nombre</label>
                <input class="styledInput rounded-3" name="nombre" value="<?= $poke["nombre"] ?>"/>
            </div>
            <div class="d-flex flex-column gap-1 text-white">
                <label for="descripcion">Descripción</label>
                <textarea class="text-black p-2" name="descripcion"><?= $poke["descripcion"] ?></textarea>
            </div>
            <div class="d-flex flex-column gap-1 text-white">
                <label for="tipos">Tipos</label>
                <select name="tipos[]" multiple class="p-2">
                    <option value="Willyrex">Willyrex</option>
                    <option value="Vegetta">Vegetta</option>
                    <option value="Fargan">Fargan</option>
                    <option value="FaltaStacks">FaltaStacks</option>
                </select>
            </div>

            <button type="submit">Actualizar</button>
        </form>
    </div>
</main>
</body>
</html>
