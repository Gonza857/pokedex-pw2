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
    <title>Detalle de Pokémon</title>
</head>
<body>
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
