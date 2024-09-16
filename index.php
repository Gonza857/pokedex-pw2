
<?php 
$pokemones = [
    [
        "codigo" => "001",
        "nombre" => "Bulbasaur",
        "descripcion" => "Un Pokémon planta y veneno. Es conocido por la semilla en su espalda.",
        "tipos" => ["Planta", "Veneno"],
        "<img src='img/image.png'>"
    ],
    [
        "codigo" => "004",
        "nombre" => "Charmander",
        "descripcion" => "Un Pokémon de fuego. Su cola siempre tiene una llama encendida.",
        "tipos" => ["Fuego"],
        "<img src='img/image.png'>"
    ],
    [
        "codigo" => "007",
        "nombre" => "Squirtle",
        "descripcion" => "Un Pokémon de agua. Usa su caparazón para protección.",
        "tipos" => ["Agua"],
        "<img src='img/image.png'>"
    ],
    [
        "codigo" => "025",
        "nombre" => "Pikachu",
        "descripcion" => "El Pokémon eléctrico más conocido, capaz de generar potentes descargas.",
        "tipos" => ["Eléctrico"],
        "<img src='img/image.png'>"
    ],
    [
        "codigo" => "150",
        "nombre" => "Mewtwo",
        "descripcion" => "Un Pokémon psíquico, creado mediante ingeniería genética.",
        "tipos" => ["Psíquico"],
        "<img src='img/image.png'>"
    ]
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pokedex</title>
</head>
<body style="background-color: lightpink">
<header>
    <img src="img/image.png">
    <h1>cualquiercosa</h1>
    <button>Iniciar sesion</button>

</header>

<main>
    <input type="text" placeholder="Ingrese el nombre, tipo o número de pokemon...">
    <input type="submit" value="buscar">
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php


$i=1;
foreach ($pokemones as $pokemon) {
    echo "pokemon " . $i . " " . $pokemon["nombre"] . "<br>";
    $i++;
}


?>
=======
</html>
