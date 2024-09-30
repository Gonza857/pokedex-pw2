<?php
session_start();
$error = $_SESSION['error-mensaje'] ?? null;
unset($_SESSION['error-mensaje']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once("./components/fuentes.html"); ?>
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del registro  -->
    <link rel="stylesheet" href="stylesheets/registro.css">
    <title>Registro Pokedex</title>
</head>
<body>
<main class="py-sm-2">
    <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 mx-auto">
        <form action="./procesos/procesar-registro.php"
              method="post"
              class="col-12 d-flex flex-column justify-content-center align-items-center gap-2 p-4">
            <h1>Poke - Registro</h1>
            <img src="imagenes-pokemon/pikachu.png" class="w-50">
            <label for="username">Nombre usuario:</label>
            <input type="text"
                   placeholder="Ingrese su nombre de usuario"
                   id="username"
                   name="username" required>

            <label for="correo">Correo electronico:</label>
            <input type="email" placeholder="Ingrese su correo electronico" id="correo" name="correo" required>

            <label for="pass">Contraseña:</label>
            <input type="password" placeholder="Ingrese su contraseña" id="pass" name="pass" required>

            <label for="passR">Repetir contraseña:</label>
            <input type="password" placeholder="Ingrese su contraseña nuevamente" id="passR" name="passR" required>
            <p class="text-danger m-0 p-0">
                <?= $error !== null ? "<strong>$error</strong>" : "" ?>
            </p>
            <div class="d-flex flex-column gap-2">
                <button type="submit" class="w-100 fs-6 fw-semibold">Registrarse</button>
                <button type="button" class="w-100 fw-semibold btnSecondary fs-6"
                        onclick="window.location.href='index.php';">Volver
                </button>
            </div>
        </form>
    </div>


</main>

</body>
</html>












