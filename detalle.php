<?php
$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedex") or die ("error en conexion");

$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$query = "SELECT *
          FROM pokemon p 
          JOIN tipo t ON p.TIPO_POKEMON = t.ID 
          WHERE p.ID_BASE = '$existeBuscado'";


$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) == 0) {
    header("Location: index.php");
    exit();
}

$resultadoConvertido = mysqli_fetch_assoc($resultado);

$carpeta = 'imagenes-pokemon/';

$imagen = $carpeta . $resultadoConvertido["IMAGEN"];
$tipo = 'tipos/' . $resultadoConvertido["imagen"];

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
            <img src="<?= $imagen; ?>" alt="<?= ucfirst($resultadoConvertido['NOMBRE']); ?>">
        </div>
        <div class="d-flex flex-column gap-2 px-4 pb-4">
            <h2 class="text-center text-white"><?= ucfirst($resultadoConvertido['NOMBRE']); ?></h2>
            <p class="m-0 fs-5 text-white">Tipo</p>
            <div class="d-flex gap-2 flex-wrap">
                    <img class="m-0 w-25 rounded-circle" src="<?= $tipo ?>" alt="<?= $resultadoConvertido['NOMBRE']; ?>">
            </div>
            <p class="m-0 text-white"><?= $resultadoConvertido['DESCRIPCION']; ?></p>
        </div>
    </div>
</main>
</body>
</html>
