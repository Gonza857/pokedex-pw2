<?php
session_start();
$error = $_SESSION['error-mensaje'] ?? null;
unset($_SESSION['error-mensaje']);

$rutaImagenPokemon = "https://imgs.search.brave.com/VF5mYvpWpZ3w01JGpXbNDeoQIzISYIa2HLfOIPCukwk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9hc3Nl/dHMuc3RpY2twbmcu/Y29tL2ltYWdlcy81/ODBiNTdmY2Q5OTk2/ZTI0YmM0M2MzMWEu/cG5n"

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once("./components/fuentes.html"); ?>
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <!-- Estilos del login -->
    <link rel="stylesheet" href="stylesheets/login.css">
    <title>Login Pokedex</title>
</head>
<body>
<header></header>
<main>
    <div class="contenedor p-2 py-3 mt-4">
        <h1 class="mb-2 mt-3 ">Poke - Login</h1>
        <img src="<?= $rutaImagenPokemon ?>"
             class="imagen">
        <form action="procesos/procesar-login.php" method="post" class="d-flex gap-2">
            <label for="correo">Correo electronico:</label>
            <input class="p-2 px-3 text-white"
                   type="text"
                   placeholder="Ingrese su correo electronico..."
                   id="correo"
                   name="correo">
            <label for="pass">Contraseña:</label>
            <input class="p-2 px-3 text-white"
                   type="password"
                   placeholder="Ingrese su contraseña..."
                   id="pass"
                   name="pass">
            <p class="text-danger m-0 p-0">
                <?= $error !== null ? "<strong>$error</strong>" : "" ?>
            </p>
            <button type="submit" class="fs-6 fw-semibold">Ingresar</button>
            <button type="button" class="mt-3 fw-semibold btnSecondary fs-6"
                    onclick="window.location.href='index.php';">
                Volver
            </button>
        </form>

    </div>
</main>
</body>
</html>

