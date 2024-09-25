<?php
session_start();
$rutaAEnviar = "procesar-login.php";
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
unset($_SESSION['error']);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pokedex</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Sofadi+One&display=swap" rel="stylesheet">

</head>
<body>

<header>

</header>

<main>

    <div class="contenedor p-2 py-3 mt-4">
        <h1 class="mb-2 mt-3 ">Poke - Login</h1>
        <img src="https://imgs.search.brave.com/VF5mYvpWpZ3w01JGpXbNDeoQIzISYIa2HLfOIPCukwk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9hc3Nl/dHMuc3RpY2twbmcu/Y29tL2ltYWdlcy81/ODBiNTdmY2Q5OTk2/ZTI0YmM0M2MzMWEu/cG5n" class="imagen">
        <?php echo '<form action="'.$rutaAEnviar.'" method="post" class="d-flex gap-2">'; ?>
                <label for="correo">Correo electronico:</label>
                <input type="text" placeholder="Ingrese su correo electronico..." id="correo" name="correo">

                <label for="pass">Contraseña:</label>
                <input type="password" placeholder="Ingrese su contraseña..." id="pass" name="pass">

            <input type="submit" value="Ingresar" class="botoncito">

        </form>
        <h1>
            <?php echo $error ? "<strong>$error</strong>" : "" ?>

        </h1>
    </div>


</main>


</body>
</html>



<?php

?>
