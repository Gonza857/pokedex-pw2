<?php

$members = [
    "Arias, Doña Sol Macarena",
    "Nania, Tomás Agustín",
    "Hidalgo, Brian Leonel",
    "Noceda, Lorenzo Facundo",
    "Ramos, Gonzalo Alex"
];

?>

<footer class="col-12 py-5">
    <!-- WRAPPER -->
    <div class="col-10 mx-auto d-flex">
        <!-- LEFT COL (LOGO, PHP) -->
        <div class="col-4 d-flex justify-content-center align-items-center p-4">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="./img/phplogosvg.svg" class="object-fit-contain footerImage">
            </div>
        </div>
        <!-- MIDDLE COL (TEAM MEMBERS) -->
        <div class="col-4 p-4 d-flex flex-column justify-content-center align-items-center gap-1 footerColBorder">
            <p class="text-white m-0 p-0 fw-bold fs-5">Integrantes</p>
            <?php foreach ($members as $member): ?>
                <?php if ($member == "Arias, Doña Sol Macarena"): ?>
                    <p class="m-0 p-0 rosita"><?= $member ?></p>
                <?php else: ?>
                    <p class="text-white m-0 p-0"><?= $member ?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- RIGHT COL (LOGO UNLAM) -->
        <div class="col-4 d-flex justify-content-center align-items-center p-4 footerColBorder">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="./img/unlamsinfondo.svg" class="object-fit-contain footerImage">
            </div>
        </div>
    </div>
</footer>
