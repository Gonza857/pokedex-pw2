<?php
session_start();

function redirigirConError($mensaje)
{
    $_SESSION['error'] = $mensaje;
    header("location: login.php");
    exit();
}

try {
    $conn = new PDO("mysql:host=localhost;dbname=pokedex", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar la base de datos: " . $e->getMessage());
}

$correo = $_POST['correo'] ?? "";
$pass = $_POST['pass'] ?? "";

if (empty($correo) || empty($pass)) {
    redirigirConError("por favor ingrese su correo y contraseña. ");
}

$stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
$stmt->bindParam(':correo', $correo);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    redirigirConError("correo inexistente. ");
}

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!password_verify($pass, $usuario['password'])) {
    redirigirConError("correo electronico o contraseña incorrectos. ");
}

$_SESSION['usuario'] = $usuario;
$_SESSION['correo'] = $correo;

header("location: index.php");
exit();