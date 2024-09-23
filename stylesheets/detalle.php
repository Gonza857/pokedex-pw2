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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/pokedex/stylesheets/detalle.php">
    <title>Detalle de Pokémon</title>
</head>
<body>
<main>

</main>
<?php
if (isset($_GET['id'])) {
    $pokemon_id = $_GET['id'];
    foreach ($pokemons as $pokemon) {
        if ($pokemon['id'] == $pokemon_id) {
            ?>
            <h2><?php echo ucfirst($pokemon['name']); ?></h2>
            <img src="<?php echo $pokemon['img']; ?>" alt="<?php echo ucfirst($pokemon['name']); ?>">
            <h3>Tipo: <?php echo ucfirst($pokemon['type']); ?></h3>
            <p><?php echo $pokemon['description']; ?></p>
            <?php
            break;
        }
    }
}
?>
</body>
</html>
