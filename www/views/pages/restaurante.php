<?php

//echo '<br><br><br>';
$id = $_GET['restaurante'];

$restaurante = RestaurantesController::mostrarDatosRestauranteCtrl($id);

//print_r($restaurante)

?>

<div class="row px-5">
    <a class="btn btn-outline-danger" href="index.php"><i class="far fa-arrow-alt-circle-left mr-2"></i>Atrás</a>
</div>
<div class="row mt-3">
    <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/img/<?= $restaurante['id_restaurante'] . "/" . $restaurante['imagen_principal']; ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/img/sushi.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/img/burger.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/img/filete.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/img/pescado.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/img/tarta_queso.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-12 col-lg-6 p-3">
        <div class="row my-2">
            <div class="col">
                <h2 class="text-center my-3 text-info" id="nombre"><?= $restaurante['nombre']; ?></h2>
            </div>
        </div>
        <div class="row my-2">
            <div class="col text-secondary text-center h4">
                Tipo de cocina: <?= $restaurante['tipo_cocina']; ?></div>
        </div>
        <div class="row my-4">
            <div class="col-md-6">
                <h4 class="text-secondary text-center h5">Índice de precios: <span class="text-success"><?= mostrarEuros($restaurante['precio']); ?></span> </h4>
            </div>
            <div class="col-md-6">
                <h4 class="text-secondary text-center h5">Valoración: <span class="text-warning"><?= mostrarEstrellas($restaurante['valoracion']); ?></span></h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-6 text-center">
                <p class="mb-1"><?= $restaurante['direccion']; ?></p>
                <p><?= $restaurante['cp']; ?> - <span><?= $restaurante['localidad']; ?></span></p>
                <p>Teléfono: <a href="tel:+<?= $restaurante['telefono']; ?>"><?= $restaurante['telefono']; ?></a> </p>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <p class="mb-1">
                    <a href="<?= $restaurante['web']; ?>" target="_blank" rel="noopener noreferrer"><?= $restaurante['web']; ?></a>
                </p>

                <a href="mailto:<?= $restaurante['email']; ?>"><?= $restaurante['email']; ?></a>
            </div>
        </div>

        <div class="row my-3">
            <div class="col text-center">
                Horario: <?= $restaurante['horario']; ?>
            </div>
        </div>
    </div>
</div>


<div id="map" lat="<?= $restaurante['latitud']; ?>" long="<?= $restaurante['longitud']; ?>"></div>