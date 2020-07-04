<?php

// echo '<br><br><br>';
$id = $_GET['restaurante'];

$restaurante = RestaurantesController::mostrarDatosRestauranteCtrl($id);

//print_r($restaurante)
if (isset($_POST['reservarMesa'])) {
    include_once 'views/components/reservaMesa.php';
}

//echo '<br><br><br>';

?>

<div class="row d-flex justify-content-between">
    <div class="col12 col-md-3 mt-1">
        <a class="btn btn-outline-danger w-100" href="index.php"><i class="far fa-arrow-alt-circle-left mr-2"></i>Atrás</a>
    </div>
    <div class="col-md-6 mt-1">
        <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#reservaModal">
            Reservar mesa
        </button>
    </div>
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


<div class="map-rest" id="map" lat="<?= $restaurante['latitud']; ?>" long="<?= $restaurante['longitud']; ?>"></div>

<!-- Modal -->
<div class="modal fade" id="reservaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="reservaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header bg-primary d-flex justify-content-center">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Reservar mesa</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                </div>
                <div class="modal-body">
                    <div class="form-group row m-1">
                        <label class="col-md-3" for="nombre">Nombre:</label>
                        <input type="text" class="form-control col-md-9" id="nombre" name="nombre" aria-describedby="nombreReserva" placeholder="Escriba su nombre completo" autofocus required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group row m-1">
                        <label class="col-md-3" for="email">Email:</label>
                        <input type="email" class="form-control col-md-9" id="email" name="email" aria-describedby="email" placeholder="Escriba su email" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group row m-1">
                        <label class="col-md-3" for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control col-md-9" id="telefono" name="telefono" aria-describedby="telefono" placeholder="Escriba su teléfono de contacto" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-5 text-center">
                            <label for="inputFecha">Día</label>
                            <input type="date" class="form-control" name="fecha" id="Fecha" min="<?= date('Y-m-d');  ?>" required>
                            <input type="hidden" name="restaurante" value="<?= $restaurante['id_restaurante']; ?>">
                        </div>
                        <div class="form-group col-md-4 text-center">
                            <label for="inputHora">Hora</label>
                            <input type="time" class="form-control" name="hora" id="hora" step="300" required>
                        </div>
                        <div class="form-group col-md-3 text-center">
                            <label for="inputPax">Comensales</label>
                            <input type="number" class="form-control" name="pax" id="inputPax" min="1" max="15" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" name="reservarMesa">Solicitar reserva</button>
                </div>
            </div>
        </form>
    </div>
</div>