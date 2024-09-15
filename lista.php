<?php
$pokemons_file = 'pokemon.json';
if (file_exists($pokemons_file)) {
    $pokemons = json_decode(file_get_contents($pokemons_file), true);
} else {
    die("El archivo de datos de Pokémon no se encontró.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Lista de Pokémon</title>
</head>
<body>
<header>
    <img src="img/image.png">
    <h1>Pokedex</h1>
    <button>Iniciar sesion</button>

</header>
<h1>Lista de Pokémon</h1>
<ul>
    <?php foreach ($pokemons as $pokemon): ?>
        <li>
            <a href="detalle.php?id=<?php echo $pokemon['id']; ?>">
                <?php echo $pokemon['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</ul>
</body>
</html>
