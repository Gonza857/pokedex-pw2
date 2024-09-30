<?php
session_start();
require_once "../clases/App.php";
$app = new App();
$rutaLogin = "../login.php";

$correo = $_POST['correo'] ?? "";
$pass = $_POST['pass'] ?? "";

if (empty($correo) || empty($pass)) {
    $app->redirigirConError("Por favor, ingrese su correo y contraseña.", $rutaLogin);
}

$usuario = $app->getUsuario($correo);

if (empty($usuario)) {
    $app->redirigirConError("El usuario no existe.", $rutaLogin);
}
if ($usuario['password'] != $pass) {
    $app->redirigirConError("Contraseña incorrecta.", $rutaLogin);
}

$resultado = $app->setearTokenAlUsuario($usuario);
if (is_string($resultado)) {
    $_SESSION["token"] = $resultado;
    header("location: ../index.php");
    exit();
} else {
    $app->redirigirConError("No se pudo iniciar sesión, intente nuevamente.", $rutaLogin);
}

?>