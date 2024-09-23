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
    <title>Lista de Pokémon</title>
</head>
<body>
<h1>Lista de Pokémon</h1>
<ul>
    <?php foreach ($pokemons as $pokemon): ?>
        <li>
            <a href="stylesheets/detalle.php?id=<?php echo $pokemon['id']; ?>">
                <?php echo $pokemon['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</ul>
</body>
</html>
