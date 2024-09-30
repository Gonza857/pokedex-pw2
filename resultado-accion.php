<?php
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
$registro = "";
$mensajeAgregado = null;
$agrega = false;

/*
  sinLoguarse && noHayRegistro -> CHAU!
  sinLoguearse && hayRegistro -> entonces recien se registró
  logueado && noHayRegistro -> agrega
 */

if (!$logueado && !isset($_SESSION["registro-exitoso"])) {
    // sin loguear y sin registro exitoso
    header('Location: login.php');
    exit();
} elseif (!$logueado && isset($_SESSION["registro-exitoso"])) {
    // sinLoguearse && hayRegistro -> entonces recien se registró
    $registro = $_SESSION["registro-exitoso"] ?? null;
    unset($_SESSION["registro-exitoso"]);
} else if ($logueado && !isset($_SESSION["registro-exitoso"])) {
    // accion-mensaje
    $mensajeAgregado = $_SESSION["accion-mensaje"] ?? "Que haces aca flaco?";
    unset($_SESSION["accion-mensaje"]);
    $agrega = true;
} else {
    echo "aca no flaco";
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("./components/fuentes.html"); ?>
    <?php include_once("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del detalle  -->
    <title>Resultado</title>
    <link rel="stylesheet" href="stylesheets/resultado-accion.css">
</head>
<body>
<main class="d-flex justify-content-center align-items-center flex-column gap-2">
    <?php if ($agrega) : ?>
        <h1>
            <?= $mensajeAgregado ?>
        </h1>
        <a href="admin.php">
            <button>
                Volver a admin
            </button>
        </a>
    <?php else: ?>
        <h1>
            <?= $registro ?>
        </h1>
        <a href="login.php">
            <button>
                Loguarse
            </button>
        </a>
    <?php endif; ?>

</main>
</body>
</html>



