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
    redirigirConError("Por favor, ingrese su correo y contraseña.");
}

$stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
$stmt->bindParam(':correo', $correo);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    redirigirConError("Correo inexistente. ");
}


$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
if ($usuario['password'] != $pass) {
    redirigirConError("Correo electrónico o contraseña incorrectos.");
}

    try {
        $_SESSION['token'] = setearToken($conn, $usuario);
    } catch (PDOException $e) {
        redirigirConError('Error al iniciar sesión. Ingrese nuevamente sus credenciales');
    }
    header("location: ../index.php");
    exit();

    function setearToken($conn, $usuario): string
    {
        $token = bin2hex(random_bytes(16));
        $sql = "UPDATE usuario SET token = ? WHERE id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token, $usuario['id_usuario']]);
        return $token;
    }

?>