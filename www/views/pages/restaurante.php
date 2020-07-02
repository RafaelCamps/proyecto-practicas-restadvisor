<?php

echo '<br><br><br>';
$id = $_GET['restaurante'];

$restaurante = RestaurantesController::mostrarDatosRestaurante($id);

//print_r($restaurante)

?>

<div class="row px-5">
    <a class="btn btn-outline-danger" href="index.php">Atrás</a>
</div>


<div class="col p-3">
    <div class="row my-2">
        <div class="col">
            <h2 class="text-center h1 my-3" id="nombre"><?= $restaurante['nombre']; ?></h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col text-secondary text-center h4">
            Tipo de cocina: <?= $restaurante['tipo_cocina']; ?></div>
    </div>
    <div class="row my-4">
        <div class="col-md-6">
            <h4 class="text-secondary text-center">Índice de precios: <span class="text-success"><?= mostrarEuros($restaurante['precio']); ?></span> </h4>
        </div>
        <div class="col-md-6">
            <h4 class="text-secondary">Valoración: <span class="text-warning"><?= $restaurante['valoracion']; ?></span></h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 text-center">
            <p><?= $restaurante['direccion']; ?></p>
            <p><?= $restaurante['cp']; ?> - <span><?= $restaurante['localidad']; ?></span></p>
            <p>Teléfono: <a href="tel:+<?= $restaurante['telefono']; ?>"><?= $restaurante['telefono']; ?></a> </p>
        </div>
        <div class="col-md-6">
            <p>
                <a href="<?= $restaurante['web']; ?>" target="_blank" rel="noopener noreferrer"><?= $restaurante['web']; ?></a>
            </p>

            <a href="mailto:<?= $restaurante['email']; ?>"><?= $restaurante['email']; ?></a>
        </div>
    </div>

    <div class="row my-1">
        <div class="col text-center">
            Horario: <?= $restaurante['horario']; ?>
        </div>
    </div>
    <div class="row mt-3">

    </div>
</div>
<div id="map" lat="<?= $restaurante['latitud']; ?>" long="<?= $restaurante['longitud']; ?>"></div>