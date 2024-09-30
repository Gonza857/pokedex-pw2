<?php
require_once "../clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
if (!$logueado) {
    header('Location: ../login.php');
    exit();
}

$areAllParamettersSetted =
    isset($_POST["codigo"])
    && isset($_POST["id_base"])
    && isset($_POST["nombre"])
    && isset($_POST["descripcion"])
    && isset($_POST["tipos"])
    && isset($_POST["imagen"]);

$error = "";
$newPoke = [];
$pudoActualizar = false;
$app = new App();
$existeBuscado = $_GET["id"] ?? false;


if (!$areAllParamettersSetted) {
    header('Location: modificar.php?id=' . $existeBuscado);
    exit();
} else {
    $newPoke = [
        "ID_BASE" => $_POST["id_base"],
        "CODIGO" => $_POST["codigo"],
        "NOMBRE" => $_POST["nombre"],
        "DESCRIPCION" => $_POST["descripcion"],
        "IMAGEN" => $_POST["imagen"],
        "TIPO_POKEMON" => $_POST["tipos"],
    ];
    $pudoActualizar = $app->actualizarPokemon($_POST["id_base"], $newPoke);
}



$_SESSION["accion-mensaje"] =
    $pudoActualizar ?
        "Se actualizó correctamente el pokemon."
        :
        "No se pudo actualizar el pokemon. Reintente nuevamente.";
header('Location: ../resultado-accion.php');
exit();

?>