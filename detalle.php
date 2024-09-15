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
    <link rel="stylesheet" href="detallePokemones.css">
    <link rel="stylesheet" href="global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Detalle de Pokémon</title>
</head>
<body >
<header>
    <img src="img/image.png">
    <h1>Pokedex</h1>
    <button>Iniciar sesion</button>

</header>
<?php
if (isset($_GET['id'])) {
    $pokemon_id = $_GET['id'];
    foreach ($pokemons as $pokemon) {
        if ($pokemon['id'] == $pokemon_id) {
            ?>
            <div class="container " >
                <div class="row">
                    <div class="col col-6">
                        <h2><?php echo $pokemon['name']; ?></h2>
                        <img src="<?php echo $pokemon['img']; ?>" alt="<?php echo $pokemon['name']; ?>">
                        <h3>Tipo: <?php echo $pokemon['type']; ?></h3>
                    </div>
                    <div class="col col-6">
                        <p style="text-align: left"><?php echo $pokemon['description']; ?></p>
                    </div>
                </div>
            </div>
            <?php
            break;
        }
    }
}
?>
</body>
</html>
