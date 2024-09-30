<?php
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
if (!$logueado) {
    header('Location: login.php');
    exit();
}
$mensajeAgregado = $_SESSION["accion-mensaje"] ?? "Que haces aca flaco?";
unset($_SESSION["accion-mensaje"]);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado</title>
    <link rel="stylesheet" href="stylesheets/resultadoAccion.css">
</head>
<body>
<h1><?= $mensajeAgregado ?></h1>
<a href="admin.php">Volver a admin</a>
</body>
</html>



