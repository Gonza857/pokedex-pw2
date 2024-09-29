<?php

require_once "./clases/App.php";
session_start();
$app = new App();
$pokemones = $app->getPokemones();
$miBusquedad = [];
$quiereBuscar = $_GET["param"] ?? false;

if ($quiereBuscar) {
    foreach ($pokemones as $poke) {
        if (str_contains(strtolower($poke["nombre"]), strtolower($quiereBuscar)) !== false) {
            $miBusquedad[] = $poke;
        }
    }
    $noEncontrado = count($miBusquedad)==0;
}

$logueado = isset($_SESSION["usuario"]) && isset($_SESSION["correo"]);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del index  -->
    <link rel="stylesheet" href="stylesheets/index.css">
    <title>Pokedex</title>
</head>
<body>
<?php require("./components/header.php") ?>
<main class="col-12 pb-5">
    <div class="col-12 col-md-5 mx-auto pt-2">
        <form class="col-12 d-flex flex-wrap">
            <a href="index.php" class="styledCleanButton col-2">
                Limpiar
            </a>
            <input name="param" class="col-8 styledSearchInput" type="text"
                   placeholder="Ingrese el nombre, tipo o número de pokemon...">
            <input class="col-2 styledSearchButton" type="submit" value="Buscar">
        </form>
    </div>
    <!--  TEXTO RESULTADOS  -->
    <?php if ($quiereBuscar && $noEncontrado): ?>
        <div class="mx-auto col-12 text-center">
            <h4 class="text-white mt-2 mb-3 p-0">Pokemon no encontrado</h4>
            <a href="index.php" class="btn btn-success">
                Ver listado de pokemones
            </a>
        </div>
    <?php endif; ?>
    <!-- WRAPPER -->
    <div class="col-10 mx-auto pt-4">
        <!-- nombre, codigo, descripcion -->
        <div class="pokemonesContainer">
            <!-- MAP -->
            <?php if ($quiereBuscar !== false): ?>
                <?php foreach ($miBusquedad as $pokemon): ?>
                    <div class="bg-white p-2 pokemonCard">
                        <div class="pokemonImageContainer">
                            <img src="<?= $pokemon["imagen"] ?>" class="w-100"/>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center gap-1 pokemonTextContainer p-1">
                            <p class="m-0 p-0 fw-bold"><?= $pokemon["codigo"] ?></p>
                            <p class="m-0 p-0 fs-6"><?= $pokemon["nombre"] ?></p>
                            <a href="detalle.php?id=<?= $pokemon["id_base"] ?>">
                                <button>Ver detalles</button>
                            </a>
                            <!--  <p class="m-0 p-0 fs-6">
                            Descripción: -->
                            <?php //= $pokemon["descripcion"] ?>
                            <!--</p>-->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($pokemones as $pokemon): ?>
                    <div class="bg-white p-2 pokemonCard">
                        <div class="pokemonImageContainer">
                            <img src="<?= $pokemon["imagen"] ?>" class="w-100"/>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center gap-1 pokemonTextContainer p-1">
                            <p class="m-0 p-0 fw-bold"><?= $pokemon["codigo"] ?></p>
                            <p class="m-0 p-0 fs-6"><?= $pokemon["nombre"] ?></p>
                            <a href="detalle.php?id=<?= $pokemon["id_base"] ?>">
                                <button>Ver detalles</button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php include_once("./components/footer.php") ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>