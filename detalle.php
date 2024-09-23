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

$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;
$pokemon_id = $existeBuscado ?: null;
$pokemonBuscado = null;
foreach ($pokemones as $pokemon) {
    if ($pokemon['codigo'] == $pokemon_id) $pokemonBuscado = $pokemon;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("./components/bootstrap-and-general-styles.html")?>
    <!--  Estilos del index  -->
    <link rel="stylesheet" href="/pokedex/stylesheets/detalle.css">
    <title>Detalle de Pokémon</title>
</head>
<body>
<?php require ("./components/header.php")?>
<main class="col-12 d-flex justify-content-center align-items-center">
    <!--  WRAPPER  -->
    <div class="col-4 mx-auto d-flex flex-column gap-2 p-2 pokemonCard">
        <div class="pokemonImageContainer">
            <img src="<?= $pokemonBuscado['imagen']; ?>" alt="<?= ucfirst($pokemonBuscado['nombre']); ?>">
        </div>
        <div class="d-flex flex-column gap-2 px-4 pb-4">
            <h2 class="text-center text-white"><?= ucfirst($pokemonBuscado['nombre']); ?></h2>
            <p class="m-0 fs-5 text-white">Tipos</p>
            <div class="d-flex gap-2 flex-wrap">
                <?php foreach ($pokemonBuscado["tipos"] as $tipo) :?>
                <div class="btn btn-info">
                    <p class="m-0"><?= $tipo ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="m-0 text-white"><?= $pokemonBuscado['descripcion']; ?></p>
        </div>
    </div>
</main>
</body>
</html>
