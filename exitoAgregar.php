<?php

$nombrePoke = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$codigoPoke = isset($_POST['codigo']) ? $_POST['codigo'] : '';
$descripcionPoke = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
$tipoPoke = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';

$imagenFinal = $_FILES['imagen']['name'];

$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedex") or die ("error en conexion");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     $query = mysqli_query($conexion, "INSERT INTO pokemon (CODIGO, NOMBRE, DESCRIPCION, TIPO_POKEMON, IMAGEN) VALUES ('$codigoPoke', '$nombrePoke', '$descripcionPoke', '$tipoPoke', '$imagenFinal')");
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poke Exito</title>
    <link rel="stylesheet" href="stylesheets/agregarPoke.css">
</head>
<body>
    <h1>Se agrego de forma PokeExitosa</h1>
    <div class="volver">
        <button class="botoncito">
            <a href="/pokedex-pw2/admin.php">VOLVER AL INICIO</a>
        </button>
    </div>

</body>
</html>

