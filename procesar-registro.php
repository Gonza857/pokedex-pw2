<?php
session_start();

function limpiarInput($data){
    return htmlspecialchars(strip_tags(trim($data)));
}


// Obtención de datos POST
$username = limpiarInput($_POST['username'] ?? "");
$correo = limpiarInput($_POST['correo'] ?? "");
$pass = $_POST['pass'] ?? "";
$passR = $_POST['passR'] ?? "";

// Redirección por error
function redirigirConError($mensaje){
    $_SESSION['error'] = $mensaje;
    header("Location: registro.php");
    exit();
}

// Saber si los campos estan vacios.
$datosVacios = $username === "" || $correo === "" || $pass === "" || $passR === "";
// Contraseñas distintas
$passInvalida = $pass !== $passR;

// Validación
if($datosVacios){
    redirigirConError("Los datos no fueron ingresados correctamente. Por favor intente de nuevo.");
}
if($passInvalida){
    redirigirConError("Las contraseñas no coinciden. Por favor intente de nuevo.");
}

$conn = new PDO("mysql:host=localhost;dbname=pokedex", "root", "");
$stmt = $conn->prepare("SELECT * FROM usuario WHERE CORREO = :correo");
$stmt->bindParam(":correo", $correo);
$stmt->execute();


// Si encuentra resultados en la BD del correo => ya existe.
if($stmt->rowCount() > 0){
    redirigirConError("Ese correo ya se encuentra registrado. Reintente con otro.");
}

$passHash = password_hash($pass, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO usuario (usuario, password, correo) VALUES (:username, :pass, :correo)");
$stmt->bindParam(":username", $username);
$stmt->bindParam(":pass", $passHash);
$stmt->bindParam(":correo", $correo);

if($stmt->execute()){
    $_SESSION['registro-exitoso'] = "Felicidades, ya se encuentra registrado en el sistema";
    header("Location: login.php");
    exit();
} else {
    redirigirConError("Hubo un error al registrar el usuario");
}
?>