<?php
$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedex") or die ("error en conexion");

$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$query = mysqli_query($conexion, "SELECT * FROM pokemon WHERE ID_BASE = " . $existeBuscado);

$fila = mysqli_fetch_assoc($query);

$poke = [
    "id_base" => $fila["ID_BASE"],
    "codigo" => $fila["CODIGO"],
    "nombre" => $fila["NOMBRE"],
    "descripcion" => $fila["DESCRIPCION"],
    "tipos" => $fila["TIPO_POKEMON"],
    "imagen" => $fila["IMAGEN"],
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del index  -->
    <link rel="stylesheet" href="/pokedex-pw2/stylesheets/detalle.css">
    <title>Detalle de Pokémon</title>
</head>
<body>
<?php require("./components/header.php") ?>
<main class="col-12 d-flex justify-content-center align-items-center">
    <!--  WRAPPER  -->
    <div class="col-4 mx-auto d-flex flex-column gap-2 p-2 pokemonCard">
        <div class="pokemonImageContainer">
            <img src="<?= $poke['imagen']; ?>" alt="<?= ucfirst($poke['nombre']); ?>">
        </div>
        <div class="d-flex flex-column gap-2 px-4 pb-4">
            <h2 class="text-center text-white"><?= ucfirst($poke['nombre']); ?></h2>
            <p class="m-0 fs-5 text-white">Tipos</p>
            <div class="d-flex gap-2 flex-wrap">
                <!--                --><?php //foreach ($poke["tipos"] as $tipo) :?>
                <div class="btn btn-info">
                    <p class="m-0"><?= $poke["tipos"] ?></p>
                </div>
                <!--                --><?php //endforeach; ?>
            </div>
            <p class="m-0 text-white"><?= $poke['descripcion']; ?></p>
        </div>
    </div>
</main>
</body>
</html>
