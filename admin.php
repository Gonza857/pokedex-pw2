<?php
session_start();
require_once("./clases/App.php");
$app = new App();
$resultados = $app->getPokemones();
$logueado = isset($_SESSION["token"]);
$mensaje = "";

if (!$logueado) {
    header('Location: login.php');
    exit();
}

$pokemones = [];

if (count($resultados) == 0) {
    $mensaje = "No se han encontrado registros";
} else {
    $pokemones = $resultados;
}

$trashIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>';
$pencilIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
</svg>';
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del admin  -->
    <link rel="stylesheet" href="stylesheets/admin.css">
    <title>Admin</title>
</head>
<body>
<?php require("./components/header.php") ?>
<main class="col-12">
    <div class="col-12 d-flex justify-content-center align-items-center py-4">
        <a href="agregar.php">
            <button>Agregar Pokemon</button>
        </a>
    </div>
    <div class="col-6 mx-auto">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
            <tr class="text-center">
                <th>Código</th>
                <th>Nombre</th>
                <!--                <th>Tipos</th>-->
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pokemones as $pokemon): ?>
                <tr>
                    <td><?= $pokemon['codigo'] ?></td>
                    <td><?= $pokemon['nombre'] ?></td>
                    <td><?= $pokemon['descripcion'] ?></td>
                    <td>
                        <div class="d-flex gap-1 w-100 justify-content-center">
                            <a href="/pokedex-pw2/modificar.php?id=<?= $pokemon["id_base"] ?>">
                                <button class="fs-5 px-3 py-2 d-flex justify-content-center align-items-center">
                                    <?= $pencilIcon ?>
                                </button>
                            </a>
                            <a href="procesos/procesar-eliminar.php?id=<?= $pokemon["id_base"] ?>">
                                <button class="fs-5 px-3 py-2 d-flex justify-content-center align-items-center">
                                    <?= $trashIcon ?>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
