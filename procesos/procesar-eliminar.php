<?php

require_once "../clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
if (!$logueado) {
    header('Location: login.php');
    exit();
}

$idEliminar = $_GET["id"] ?? false;
var_dump($_GET["id"]);
$app = new App();
$pudoEliminar = $app->eliminarPokemon($idEliminar);
$_SESSION["accion-mensaje"] =
    $pudoEliminar ?
        "Se eliminó correctamente el pokemon."
        :
        "No se pudo eliminar el pokemon. Reintente nuevamente.";
header('Location: ../resultado-accion.php');
exit();

?>

