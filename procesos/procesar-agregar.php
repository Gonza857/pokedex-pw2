<?php
require_once "../clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
$app = new App();
if (!$logueado) {
    header('Location: login.php');
    exit();
}

$pCodigo = $_POST['codigo'] ?? '';
$pNombre = $_POST['nombre'] ?? '';
$pDescripcion = $_POST['descripcion'] ?? '';
$pTipo = $_POST['tipo'] ?? '';
$pImagen = $_FILES['imagen']['name'];

$areAllParamettersSetted =
    isset($_POST["codigo"])
    && isset($_POST["nombre"])
    && isset($_POST["descripcion"])
    && isset($_POST["tipo"]);

$pudoAgregar = false;

if (!$areAllParamettersSetted) {
    header('Location: agregar.php');
    exit();
} else {
    $newPoke = [
        "CODIGO" => $pCodigo,
        "NOMBRE" => $pNombre,
        "DESCRIPCION" => $pDescripcion,
        "IMAGEN" => $pImagen,
        "TIPO_POKEMON" => $pTipo,
    ];
    $pudoAgregar = $app->altaPokemon($newPoke);
}

$_SESSION["accion-mensaje"] =
    $pudoAgregar ?
        "Se agregó correctamente el pokemon."
        :
        "No se pudo agregar el pokemon. Reintente nuevamente.";
header('Location: ../resultado-accion.php');
exit();

?>