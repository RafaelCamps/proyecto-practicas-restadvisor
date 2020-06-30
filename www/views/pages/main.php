<?php
$restaurantes = RestaurantesController::listarRestaurantesCtrl();

//var_dump($restaurantes);
?>

<div class="content container mt-5 bg-light">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 pt-5 pb-3">
        <?php for ($i = 0; $i < count($restaurantes); $i++) : ?>
            <div href="#" class="col mb-4">
                <div class="card h-100">
                    <img src="./public/img/<?= $restaurantes[$i]['id_restaurante'] . "/" . $restaurantes[$i]['imagen_principal'];  ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a class="stretched-link text-decoration-none" href="#">
                            <h5 class="card-title text-center"><?= $restaurantes[$i]['nombre']; ?></h5>
                        </a>
                        <p class="text-secondary"><?= $restaurantes[$i]['localidad']; ?></p>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

</div>