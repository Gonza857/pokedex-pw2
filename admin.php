<?php
$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedexphp") or die ("error en conexion");

$query = mysqli_query($conexion, "SELECT * FROM pokemon");

$pokemons = [];


while ($fila = mysqli_fetch_assoc($query)) {
    $poke = [
        "id_base" => $fila["ID_BASE"],
        "codigo" => $fila["CODIGO"],
        "nombre" => $fila["NOMBRE"],
        "descripcion" => $fila["DESCRIPCION"],
        "tipos" => json_encode($fila["TIPO_POKEMON"]),
        "imagen" => $fila["IMAGEN"],
    ];
    $pokemons[] = $poke;
}


mysqli_close($conexion);

// TODO: renderizar tipo

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
        <button>Agregar Pokemon</button>
    </div>
    <div class="col-8 mx-auto">
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
            <?php foreach ($pokemons as $pokemon): ?>
                <tr>
                    <td><?= $pokemon['codigo'] ?></td>
                    <td><?= $pokemon['nombre'] ?></td>
                    <td><?= $pokemon['descripcion'] ?></td>
                    <td>
                        <div class="d-flex gap-1 w-100 justify-content-center">
                            <a href="/pokedex-pw2/modificar.php?id=<?= $pokemon["id_base"] ?>">
                                <button>Modificar</button>
                            </a>
                            <button>Eliminar</button>
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
