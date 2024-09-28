<?php

$nombrePoke = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$codigoPoke = isset($_POST['codigo']) ? $_POST['codigo'] : '';
$descripcionPoke = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
$tipoPoke = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';
$imagenFinal = $_FILES['imagen']['name'];



$conexion = mysqli_connect(
    "localhost",
    "root",
    "",
    "pokedex") or die ("error en conexion");



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt=$conexion->prepare("SELECT * FROM pokemon WHERE CODIGO=?");
    $stmt->bind_param("s",$codigoPoke);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0){
        echo "Error: Este codigo ya esta asignado a otro pokemon";
        $stmt->close();
        mysqli_close($conexion);
        exit;
    }

    $stmtInsert=$conexion->prepare("INSERT INTO pokemon (CODIGO,NOMBRE,DESCRIPCION, TIPO_POKEMON, IMAGEN) VALUES (?, ?, ?, ?, ?)");
    $stmtInsert->bind_param('sssss',$codigoPoke,$nombrePoke,$descripcionPoke,$tipoPoke,$imagenFinal);


}
mysqli_close($conexion);






?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poke Exito</title>
    <link rel="stylesheet" href="stylesheets/agregarPoke.css">
</head>
<body>
<?php
$errorMsg="";
if ($stmtInsert->execute()){
$errorMsg= "POKEMON AGREGADO CON EXITO!";
}else{
$errorMsg="ERROR AL INSERTAR DATOS!" .$conexion->error;
}

$stmt->close();
$stmtInsert->close();
?>

    <h1>Se agrego de forma PokeExitosa</h1>
    <div class="volver">

        <button class="botoncito">
            <a href="/pokedex-pw2/admin.php">VOLVER AL INICIO</a>
        </button>
    </div>
<?php
echo $errorMsg;
?>

</body>
</html>

