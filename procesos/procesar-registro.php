<?php
session_start();
require_once "../clases/App.php";
$app = new App();
$ruta = "../registro.php";

// Obtención de datos POST
$username = $app->limpiarInput($_POST['username'] ?? "");
$correo = $app->limpiarInput($_POST['correo'] ?? "");
$pass = $_POST['pass'] ?? "";
$passR = $_POST['passR'] ?? "";

// Saber si los campos estan vacios.
$datosVacios = $username === "" || $correo === "" || $pass === "" || $passR === "";
// Contraseñas distintas
$passInvalida = $pass !== $passR;

// Validación
if ($datosVacios) {
    $app->redirigirConError("Los datos no fueron ingresados correctamente. Por favor intente de nuevo.", $ruta);
}
if ($passInvalida) {
    $app->redirigirConError("Las contraseñas no coinciden. Por favor intente de nuevo.", $ruta);
}

$usuario = $app->getUsuario($correo);
$pudoAgregarlo = false;

if (!empty($usuario)) {
    $app->redirigirConError("Ese correo ya se encuentra registrado. Reintente con otro.", $ruta);
} else {
    $pudoAgregarlo = $app->altaUsuario($username, $correo, $pass);
}

if ($pudoAgregarlo) {
    $_SESSION['registro-exitoso'] = "Felicidades, ya se encuentra registrado en el sistema";
    var_dump($_SESSION['registro-exitoso']);
    header("Location: ../resultado-accion.php");
    exit();
} else {
    $app->redirigirConError("No se pudo realizar el registro, intente nuevamente.", $ruta);
}
?>