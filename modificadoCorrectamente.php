<?php


$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedexphp") or die ("error en conexion");

$existeBuscado = isset($_GET["id"]) ? $_GET["id"] : false;

$query = mysqli_query($conexion, "SELECT * FROM pokemon WHERE ID_BASE = " . $existeBuscado);

$fila = mysqli_fetch_assoc($query);

$poke = [
    "id_base" => $fila["ID_BASE"],
    "codigo" => $fila["CODIGO"],
    "nombre" => $fila["NOMBRE"],
    "descripcion" => $fila["DESCRIPCION"],
    "tipos" => json_encode($fila["TIPO_POKEMON"]),
    "imagen" => "./imagenes-pokemon/1.webp",
];
// TODO: revisar si la traer el pokemon es necesario, ya que la info la trae modificar.php y no se cree
// no este validada. con hacer update en la db es suficiente creo
// gonza :)

$areAllParamettersSetted =
    isset($_POST["codigo"])
    && isset($_POST["id_base"])
    && isset($_POST["nombre"])
    && isset($_POST["descripcion"])
    && isset($_POST["tipos"])
    && isset($_POST["imagen"]);

$error = "";
$newPoke = [];

if ($areAllParamettersSetted) {
    $newPoke = [
        "ID_BASE" => $_POST["id_base"],
        "CODIGO" => $_POST["codigo"],
        "NOMBRE" => $_POST["nombre"],
        "DESCRIPCION" => $_POST["descripcion"],
        "IMAGEN" => $_POST["imagen"],
        "TIPO_POKEMON" => $_POST["tipos"],
    ];
    // TODO: mandar a la db
//    header("Location: admin.php");
//    exit();
} else {
    //  TODO: manejar error, no estan todos los parametros
    $hola = "hola, hacer el error";
}


/*
 -- LOGICA PARA AGREGAR, TRANSFOROMAR IMAGEN EN RUTA PARA GUARDAR COMO ATRIBUTO DE POKEMON EN BD -> VA EN "AGREGAR.PHP"
$archivo = "";
$formatosAdmitidos = ["image/jpeg", "image/png", "image/webp"];
     $archivo = $_FILES["imagen"];
    if ($archivo["error"] == 0
        && $archivo["size"] > 0
        && saberSiSuTipoEsCorrecto($archivo["type"])) {
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        move_uploaded_file(
            $_FILES["imagen"]["tmp_name"],
            "./imagenes-pokemon/" . $poke["id_base"] . "." . $extension);


function saberSiSuTipoEsCorrecto($archivoFormato): bool
{
    global $formatosAdmitidos;
    foreach ($formatosAdmitidos as $formato) {
        if ($formato == $archivoFormato) {
            return true;
        }
    }
    return false;
}
 */


?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require("./components/bootstrap-and-general-styles.html") ?>
    <!--  Estilos del admin  -->
    <link rel="stylesheet" href="stylesheets/modificadoCorrectamente.css">
    <title>Modificado correctamente</title>
</head>
<body>
<?php require("./components/header.php") ?>
<main class="col-12 text-white d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column align-items-center ajustify-content-center">
        <h1>¡Pokemon modificado correctamente!</h1>
        <a href="/pokedex-pw2/admin.php">
            <button>Ir a administración</button>
        </a></div>

</main>
</body>
</html>
