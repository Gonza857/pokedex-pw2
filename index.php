<?php

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedexphp") or die ("error en conexion");

$query = mysqli_query($conexion, "SELECT * FROM pokemon");

$pokemons = [];


while ($fila = mysqli_fetch_assoc($query)) {
    $poke = [
        "codigo" => $fila["CODIGO"],
        "nombre" => $fila["NOMBRE"],
        "descripcion" => $fila["DESCRIPCION"],
        "tipos" => json_encode($fila["TIPO_POKEMON"]),
        "imagen" => $fila["IMAGEN"],
    ];
    $pokemons[]= $poke;
}


mysqli_close($conexion);

$resultado = "";
$miBusquedad = [];
$acertados = 0;

$quiereBuscar = isset($_GET["param"]) ? $_GET["param"] : false;
if ($quiereBuscar) {
    $resultado = "BUSCANDO";
    foreach ($pokemons as $poke) {
        if (str_contains(strtolower($poke["nombre"]), strtolower($quiereBuscar)) !== false) {
            $miBusquedad[] = $poke;
            $acertados++;
        }
    }
    $resultado = "Resultados encontrados: " . count($miBusquedad);
} else {
    $resultado = "NO BUSCANDO";
}


?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require ("./components/bootstrap-and-general-styles.html")?>
    <!--  Estilos del index  -->
    <link rel="stylesheet" href="stylesheets/index.css">
    <title>Pokedex</title>
</head>
<body>
<?php require ("./components/header.php")?>
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
    <?php if ($quiereBuscar !== false): ?>
        <div class="mx-auto col-12 text-center">
            <p class="text-white m-0 p-0"> Se encontraron <?= count($miBusquedad) ?> resultados coincidentes</p>
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
                            <button>Ver detalles</button>
                            <!--  <p class="m-0 p-0 fs-6">
                            Descripción: -->
                            <?php //= $pokemon["descripcion"] ?>
                            <!--</p>-->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($pokemons as $pokemon): ?>
                    <div class="bg-white p-2 pokemonCard">
                        <div class="pokemonImageContainer">
                            <img src="<?= $pokemon["imagen"] ?>" class="w-100"/>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center gap-1 pokemonTextContainer p-1">
                            <p class="m-0 p-0 fw-bold"><?= $pokemon["codigo"] ?></p>
                            <p class="m-0 p-0 fs-6"><?= $pokemon["nombre"] ?></p>
                            <a href="detalle.php?id=<?= $pokemon["codigo"] ?>">
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