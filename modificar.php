<?php

session_start();
$logueado = (isset($_SESSION["usuario"]) && isset($_SESSION["correo"])) ? true : false;
if (!$logueado) {
    header('Location: login.php');
    exit();
}

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedex") or die ("error en conexion");

$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$query = mysqli_query($conexion, "SELECT * FROM pokemon WHERE ID_BASE = " . $existeBuscado);
$query2 = mysqli_query($conexion, "SELECT * FROM TIPO");

$fila = mysqli_fetch_assoc($query);
$tipos = mysqli_fetch_assoc($query2);
$tiposArray = [];

while ($tipos = mysqli_fetch_assoc($query2)) {
    $tipo = [
        "id" => $tipos["ID"],
        "nombre" => $tipos["NOMBRE"],
        "imagen" => $tipos["imagen"],
    ];
    $tiposArray[] = $tipo;
}

$poke = [
    "id_base" => $fila["ID_BASE"],
    "codigo" => $fila["CODIGO"],
    "nombre" => $fila["NOMBRE"],
    "descripcion" => $fila["DESCRIPCION"],
    "tipos" => json_encode($fila["TIPO_POKEMON"]),
    "imagen" => "./imagenes-pokemon/1.webp",
];

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
<main class="col-12">
    <div class="mx-auto">
        <form method="post" action="modificadoCorrectamente.php?id=<?= $poke["id_base"] ?>"
              enctype="multipart/form-data"
              class="mt-3 d-flex flex-column gap-2 col-4 mx-auto border rounded-4 p-4">
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
                <select name="tipos" class="p-2">
                    <?php foreach ($tiposArray as $t): ?>
                        <option value="<?= $t["id"] ?>"><?= $t["nombre"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex flex-column gap-2 text-white contenedorImagen">
                <img src="<?= $poke["imagen"] ?>" class="imagenPokemon"/>
                <input type="hidden" name="imagen" value="<?= $poke["imagen"] ?>"/>
            </div>
            <p class="text-white"><?php var_dump($poke["id_base"]) ?></p>
            <input type="hidden" name="id_base" value="<?= $poke["id_base"] ?>"/>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</main>
</body>
</html>
