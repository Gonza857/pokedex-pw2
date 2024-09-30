<?php
session_start();
$rutaCss = "stylesheets/registro.css";
$rutaAEnviar= "procesar-registro.php";
$error = isset($_SESSION["error"]) ? $_SESSION["error"] : null;
unset($_SESSION["error"]);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php include_once ("./components/fuentes.html"); ?>
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <link rel="stylesheet" href="<?= $rutaCss ?>">
    <title>Registro Pokedex</title>
</head>
<body>





<main>
<div class="formulario">
    <?php echo '<form action="'.$rutaAEnviar.'" method="post" class="d-flex gap-2">'; ?>
    <h1>Poke - Registro</h1>
    <img src="imagenes-pokemon/pikachu.png" class="w-50">

        <label for="username">Nombre usuario:</label>
        <input type="text" placeholder="Ingrese su nombre de usuario" id="username" name="username" required>

        <label for="correo">Correo electronico:</label>
        <input type="text" placeholder="Ingrese su correo electronico" id="correo" name="correo" required>

        <label for="pass">Contraseña:</label>
        <input type="password" placeholder="Ingrese su contraseña" id="pass" name="pass" required>

        <label for="passR">Repetir contraseña:</label>
        <input type="password" placeholder="Ingrese su contraseña nuevamente" id="passR" name="passR" required>

    <button type="submit" class="boton">Registrarse</button>
    <?php echo $error ? "<strong>$error</strong>" : "" ?>
    </form>

</div>
</main>

</body>
</html>












