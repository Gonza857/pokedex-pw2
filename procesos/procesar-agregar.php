<?php
require_once "../clases/App.php";
session_start();
$logueado = isset($_SESSION["token"]) ?? false;
$app = new App();
if (!$logueado) {
    header('Location: login.php');
    exit();
}

$pudoAgregar = false;

$tiposPermitidos = ['image/svg+xml', 'image/webp', 'image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'];

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $archivo = $_FILES['imagen'];
    $nombreArchivo = $archivo['name'];
    $tipoArchivo = $archivo['type'];
    $tamanoArchivo = $archivo['size'];
    $errorArchivo = $archivo['error'];
    $rutaTemporal = $archivo['tmp_name'];

    if (!in_array($tipoArchivo, $tiposPermitidos)) {
        $app->redirigirConError("El tipo de archivo no está permitido. Solo se permiten SVG, WEBP, PNG, JPG, y JPEG.", "../agregar.php");
    } // Si no hay errores y el archivo es válido
    else {
        // Mover el archivo a la carpeta de destino
        $carpetaDestino = 'imagenes-pokemon/';  // Ruta de la carpeta donde almacenarás las imágenes
        $rutaDestino = $carpetaDestino . basename($nombreArchivo);

        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            $pudoAgregar = true;
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
} else {
    $app->redirigirConError("No se ha subido ningún archivo o hubo un error en la subida.", "../agregar.php");

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


if (!$areAllParamettersSetted) {
    $app->redirigirConError("Completa todos los campos.", "../agregar.php");
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