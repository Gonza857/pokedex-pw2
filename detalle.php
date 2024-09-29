<?php
require_once "./clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
$existeBuscado = $_GET["id"] ?? false;
$app = new App();
$resultadoConvertido = $app->getPokemonConTipo($existeBuscado);

$carpetaPokemones = 'imagenes-pokemon/';
$carpetaTipos = "tipos/";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del detalle  -->
    <link rel="stylesheet" href="/pokedex-pw2/stylesheets/detalle.css">
    <title>Detalle de Pokémon</title>
</head>
<body>
<?php require("./components/header.php") ?>
<main class="col-12 d-flex justify-content-center align-items-center">
    <!--  WRAPPER  -->
        <div class="col-4 mx-auto d-flex flex-column gap-2 p-2 pokemonCard">
            <div class="pokemonImageContainer">
                <img src="<?= $carpetaPokemones . $resultadoConvertido["imagen"]; ?>"
                     alt="<?= ucfirst($resultadoConvertido['nombre']); ?>">
            </div>
            <div class="d-flex flex-column gap-2 px-4 pb-4">
                <h2 class="text-center text-white"><?= ucfirst($resultadoConvertido['nombre']); ?></h2>
                <p class="m-0 fs-5 text-white">Tipo</p>
                <div class="d-flex gap-2 flex-wrap">
                    <img class="m-0 tipoImage rounded-circle" src="<?= $carpetaTipos . $resultadoConvertido["tipoImagen"] ?>"
                         alt="<?= $resultadoConvertido['nombre']; ?>">
                </div>
                <p class="m-0 text-white"><?= $resultadoConvertido['descripcion']; ?></p>
            </div>
        </div>
</main>
</body>
</html>
