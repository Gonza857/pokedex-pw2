<?php
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
if (!$logueado && !isset($_SESSION["registro-exitoso"])) {
    header('Location: login.php');
    exit();
}
$mensajeAgregado = $_SESSION["accion-mensaje"] ?? "Que haces aca flaco?";
$registro = $_SESSION["registro-exitoso"] ?? null;
unset($_SESSION["accion-mensaje"]);


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
    <?php if (is_string($mensajeAgregado) && is_null($registro)) : ?>
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



