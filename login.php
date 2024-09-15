<?php

$es_error = "";


    $correo = isset($_GET['correo']) ? $_GET['correo'] : null;
    $contrasenia = isset($_GET['pass']) ? $_GET['pass'] : null;
    $areParametersSetted = isset($_GET["correo"]) && isset($_GET["pass"]); // si estan en la URL

    if(($correo == "" || $contrasenia == "") && $areParametersSetted){

        $es_error = "Los datos no pueden estar vacios";

    }




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pokedex</title>
    <link rel="stylesheet" href="global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: hotpink">

<header>
    <h1 style="color: pink">VIVA SOL ARIAS</h1>
</header>

<main>

    <div>
        <form method="get" class="d-flex gap-2">
            <label for="correo">Correo electronico:</label>
            <input type="text" placeholder="Ingrese su correo electronico" id="correo" name="correo">


            <label for="pass">Contraseña:</label>
            <input type="password" placeholder="Ingrese su contraseña" id="pass" name="pass">

            <input type="submit" value="Ingresar" class="botoncito">



        </form>
        <h1>
            <?php echo $es_error ?>
        </h1>
    </div>


</main>







</body>
</html>



<?php

?>
