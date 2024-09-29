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

<h1><?= $mensajeAgregado ?></h1>
<a href="admin.php">Volver a admin</a>
