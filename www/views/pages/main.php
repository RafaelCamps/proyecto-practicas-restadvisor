<?php

if(isset($_POST['buscar'])){
   $filtro = $_POST['buscar'];
} else {
   $filtro = "";
}
    $restaurantes = RestaurantesController::listarRestaurantesCtrl($filtro);
// echo '<br><br><br>';
// var_dump($_POST);
//var_dump($restaurantes);
?>

<div class="content container mt-5 bg-light">
    <div class="row">
        <div class="col d-flex justify-content-end pt-3">
            <form class="form-inline" method="POST">
                <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Buscar" aria-label="Search">
                <select class="form-control mr-2" name="campo" id="campo">
                    <option value="nombre">por nombre</option>
                    <option value="localidad">por localidad</option>
                    <option value="precio">por índice de precios</option>
                    <option value="tipo_cocina">por tipo de cocina</option>
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>

    </div>
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