<?php
$pokemones = [
    [
        "codigo" => "1",
        "nombre" => "Bulbasaur",
        "descripcion" => "Un Pokémon planta y veneno. Es conocido por la semilla en su espalda.",
        "tipos" => ["Planta", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "2",
        "nombre" => "Ivysaur",
        "descripcion" => "La evolución de Bulbasaur. Tiene una flor en su espalda.",
        "tipos" => ["Planta", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "3",
        "nombre" => "Venusaur",
        "descripcion" => "La evolución final de Bulbasaur. Tiene una flor grande en su espalda.",
        "tipos" => ["Planta", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "4",
        "nombre" => "Charmander",
        "descripcion" => "Un Pokémon de tipo fuego. Su cola arde con una llama.",
        "tipos" => ["Fuego"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "5",
        "nombre" => "Charmeleon",
        "descripcion" => "La evolución de Charmander. Su temperamento se vuelve más agresivo.",
        "tipos" => ["Fuego"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "6",
        "nombre" => "Charizard",
        "descripcion" => "La evolución final de Charmander. Un dragón que vuela y lanza fuego.",
        "tipos" => ["Fuego", "Volador"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "7",
        "nombre" => "Squirtle",
        "descripcion" => "Un Pokémon de tipo agua con una concha dura que lo protege.",
        "tipos" => ["Agua"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "8",
        "nombre" => "Wartortle",
        "descripcion" => "La evolución de Squirtle. Su cola es más larga y peluda.",
        "tipos" => ["Agua"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "9",
        "nombre" => "Blastoise",
        "descripcion" => "La evolución final de Squirtle. Tiene cañones de agua en su espalda.",
        "tipos" => ["Agua"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "10",
        "nombre" => "Caterpie",
        "descripcion" => "Un Pokémon oruga que evoluciona rápidamente.",
        "tipos" => ["Bicho"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "11",
        "nombre" => "Metapod",
        "descripcion" => "La evolución de Caterpie. Se encierra en un capullo para protegerse.",
        "tipos" => ["Bicho"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "12",
        "nombre" => "Butterfree",
        "descripcion" => "La evolución final de Caterpie. Un Pokémon mariposa que puede volar.",
        "tipos" => ["Bicho", "Volador"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "13",
        "nombre" => "Weedle",
        "descripcion" => "Un Pokémon insecto con un aguijón venenoso en la cabeza.",
        "tipos" => ["Bicho", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "14",
        "nombre" => "Kakuna",
        "descripcion" => "La evolución de Weedle. En su estado de capullo, apenas se mueve.",
        "tipos" => ["Bicho", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "15",
        "nombre" => "Beedrill",
        "descripcion" => "La evolución final de Weedle. Tiene grandes aguijones en sus patas.",
        "tipos" => ["Bicho", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "16",
        "nombre" => "Pidgey",
        "descripcion" => "Un pequeño Pokémon volador que es muy común en las zonas rurales.",
        "tipos" => ["Normal", "Volador"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "17",
        "nombre" => "Pidgeotto",
        "descripcion" => "La evolución de Pidgey. Es más rápido y fuerte.",
        "tipos" => ["Normal", "Volador"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "18",
        "nombre" => "Pidgeot",
        "descripcion" => "La evolución final de Pidgey. Sus alas le permiten volar a grandes velocidades.",
        "tipos" => ["Normal", "Volador"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "19",
        "nombre" => "Rattata",
        "descripcion" => "Un pequeño roedor que tiene dientes afilados.",
        "tipos" => ["Normal"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "20",
        "nombre" => "Raticate",
        "descripcion" => "La evolución de Rattata. Tiene colmillos grandes y peligrosos.",
        "tipos" => ["Normal"],
        "imagen" => "img/image.png"
    ]
];

$resultado = "";
$miBusquedad = [];
$acertados = 0;

$quiereBuscar = isset($_GET["param"]) ? $_GET["param"] : false;
if ($quiereBuscar) {
    $resultado = "BUSCANDO";
    foreach ($pokemones as $poke) { // hola, ola -> true
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/index.css">
    <title>Pokedex</title>
</head>
<body style="background-color: #2f2f2f">
<header class="col-12">
    <div class="col-10 mx-auto d-flex flex-wrap justify-content-between align-items-center">
        <div class="h-75 rounded-circle overflow-hidden">
            <img src="img/image.png" alt="Logo" class="h-100">
        </div>
        <h1 class="text-white">Pokedex</h1>
        <div class="d-flex gap-2 flex-wrap">
            <a href="login.php">
                <button>Iniciar sesion</button>
            </a>
            <a href="registro.php">
                <button>Registrarse</button>
            </a>
        </div>

    </div>
</header>
<main class="col-12 pb-5">
    <div class="col-5 mx-auto pt-2">
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
                <?php foreach ($pokemones as $pokemon): ?>
                    <div class="bg-white p-2 pokemonCard">
                        <div class="pokemonImageContainer">
                            <img src="<?= $pokemon["imagen"] ?>" class="w-100"/>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center gap-1 pokemonTextContainer p-1">
                            <p class="m-0 p-0 fw-bold"><?= $pokemon["codigo"] ?></p>
                            <p class="m-0 p-0 fs-6"><?= $pokemon["nombre"] ?></p>
                            <a href="stylesheets/detalle.php?id=<?= $pokemon[">
                                <button>Ver detalles</button>
                            </a>                            <!--  <p class=" m-0 p-0 fs-6">
                            Descripción: -->
                            <?php //= $pokemon["descripcion"] ?>
                            <!--</p>-->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php include_once ("./components/footer.php")?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>