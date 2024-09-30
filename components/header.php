<?php

$logueado = isset($_SESSION["token"]);

?>

<header class="col-12">
    <div class="col-12 px-2 px-md-0 col-md-10 mx-auto d-flex flex-wrap justify-content-between align-items-center">
        <a href="/pokedex-pw2/index.php" class="text-decoration-none box2 d-flex align-items-center">
            <div class="overflow-hidden headerImageContainer mx-auto">
                <img src="img/assets/pokemonlogo.svg" alt="Logo">
            </div>
        </a>
        <div class="d-flex gap-2 flex-wrap box3">
            <?php if ($logueado): ?>
                <a href="/pokedex-pw2/procesos/cerrar-sesion.php">
                    <button>Cerrar sesión</button>
                </a>
                <a href="/pokedex-pw2/admin.php">
                    <button>Admin</button>
                </a>
            <?php else:?>
                <a href="/pokedex-pw2/login.php">
                    <button>Iniciar sesion</button>
                </a>
                <a href="/pokedex-pw2/registro.php">
                    <button>Registrarse</button>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>
