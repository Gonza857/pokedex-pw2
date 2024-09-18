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
        "nombre" => "Charmander",
        "descripcion" => "Un Pokémon de fuego. Su cola siempre tiene una llama encendida.",
        "tipos" => ["Fuego"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "3",
        "nombre" => "Squirtle",
        "descripcion" => "Un Pokémon de agua. Usa su caparazón para protección.",
        "tipos" => ["Agua"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "4",
        "nombre" => "Pikachu",
        "descripcion" => "El Pokémon eléctrico más conocido, capaz de generar potentes descargas.",
        "tipos" => ["Eléctrico"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "5",
        "nombre" => "Mewtwo",
        "descripcion" => "Un Pokémon psíquico, creado mediante ingeniería genética.",
        "tipos" => ["Psíquico"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "5",
        "nombre" => "Mewtwo",
        "descripcion" => "Un Pokémon psíquico, creado mediante ingeniería genética.",
        "tipos" => ["Psíquico"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "1",
        "nombre" => "Bulbasaur",
        "descripcion" => "Un Pokémon planta y veneno. Es conocido por la semilla en su espalda.",
        "tipos" => ["Planta", "Veneno"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "2",
        "nombre" => "Charmander",
        "descripcion" => "Un Pokémon de fuego. Su cola siempre tiene una llama encendida.",
        "tipos" => ["Fuego"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "3",
        "nombre" => "Squirtle",
        "descripcion" => "Un Pokémon de agua. Usa su caparazón para protección.",
        "tipos" => ["Agua"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "4",
        "nombre" => "Pikachu",
        "descripcion" => "El Pokémon eléctrico más conocido, capaz de generar potentes descargas.",
        "tipos" => ["Eléctrico"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "5",
        "nombre" => "Mewtwo",
        "descripcion" => "Un Pokémon psíquico, creado mediante ingeniería genética.",
        "tipos" => ["Psíquico"],
        "imagen" => "img/image.png"
    ],
    [
        "codigo" => "5",
        "nombre" => "Mewtwo",
        "descripcion" => "Un Pokémon psíquico, creado mediante ingeniería genética.",
        "tipos" => ["Psíquico"],
        "imagen" => "img/image.png"
    ]
];

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
<header class="col-12 d-flex flex-row flex-wrap justify-content-between align-items-center px-4 bor3">
    <div class="h-75 bor1 rounded-circle overflow-hidden">
        <img src="img/image.png" alt="Logo" class="h-100">
    </div>
    <h1 class="text-white">Pokedex</h1>
    <button>Iniciar sesion</button>
</header>
<main class="col-12 bor1">
    <div class="col-5 mx-auto bor2">
        <form class="col-12 d-flex flex-wrap">
            <input class="col-8 styledSearchInput" type="text" placeholder="Ingrese el nombre, tipo o número de pokemon...">
            <input class="col-4 styledSearchButton" type="submit" value="Buscar">
        </form>
    </div>
    <!-- WRAPPER -->
    <div class="col-10 mx-auto pt-2">
        <!-- nombre, codigo, descripcion -->
        <div class="pokemonesContainer">
            <!-- MAP -->
            <?php foreach ($pokemones as $pokemon): ?>
                <div class="bg-white p-2 pokemonCard">
                    <div class="pokemonImageContainer">
                        <img src="<?= $pokemon["imagen"] ?>" class="w-100"/>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center gap-1 pokemonTextContainer p-1">
                        <p class="m-0 p-0 fw-bold"><?= $pokemon["codigo"] ?></p>
                        <p class="m-0 p-0 fs-6"><?= $pokemon["nombre"] ?></p>
                        <!--  <p class="m-0 p-0 fs-6">
                        Descripción: -->
                        <?php //= $pokemon["descripcion"] ?>
                        <!--</p>-->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<footer class="col-12 py-5 d-flex justify-content-center align-items-center bg-dark">
    <h1 class="text-white">Hello World! (cambiar)</h1>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

