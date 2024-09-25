<?php
$hi = "Pokemones";
$pokemones = [
    [
        "codigo" => "001",
        "nombre" => "Bulbasaur",
        "descripcion" => "Un Pokémon planta y veneno. Es conocido por la semilla en su espalda.",
        "tipos" => ["Planta", "Veneno"],
        "<img src='img/assets/image.png'>"
    ],
    [
        "codigo" => "004",
        "nombre" => "Charmander",
        "descripcion" => "Un Pokémon de fuego. Su cola siempre tiene una llama encendida.",
        "tipos" => ["Fuego"],
        "<img src='img/assets/image.png'>"
    ],
    [
        "codigo" => "007",
        "nombre" => "Squirtle",
        "descripcion" => "Un Pokémon de agua. Usa su caparazón para protección.",
        "tipos" => ["Agua"],
        "<img src='img/assets/image.png'>"
    ],
    [
        "codigo" => "025",
        "nombre" => "Pikachu",
        "descripcion" => "El Pokémon eléctrico más conocido, capaz de generar potentes descargas.",
        "tipos" => ["Eléctrico"],
        "<img src='img/assets/image.png'>"
    ],
    [
        "codigo" => "150",
        "nombre" => "Mewtwo",
        "descripcion" => "Un Pokémon psíquico, creado mediante ingeniería genética.",
        "tipos" => ["Psíquico"],
        "<img src='img/assets/image.png'>"
    ],
    [
        "codigo" => "777",
        "nombre" => "Jimena",
        "descripcion" => "Harta.",
        "tipos" => ["Psíquico"],
        "<img src='img/assets/image.png'>"
    ]
];
$error = "";

$email = isset($_GET["email"]) ? $_GET["email"] : null;
$password = isset($_GET["password"]) ? $_GET["password"] : null;

$areParametersSetted = isset($_GET["email"]) && isset($_GET["password"]); // si estan en la URL

if (($email == "" || $password == "") && $areParametersSetted) {
    $error = "todo mal";
}

?>


<html>
<head>
    <title>Hola mundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<main class="d-flex flex-column">
    <h1><?= $hi ?></h1>
    <div class="col-6 mx-auto">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($pokemones as $pokemon) {
                echo "<tr>";
                echo "<td>{$pokemon['codigo']}</td>";
                echo "<td>{$pokemon['nombre']}</td>";
                echo "<td>{$pokemon['descripcion']}</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <h1>
        <?= $error ?>
    </h1>
    <form enctype="multipart/form-data">
        <input type="mail" name="email">
        <input type="text" name="password">
        <button type="submit">Enviar</button>
    </form>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>