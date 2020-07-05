<?php
// echo "<br><br><br>";
// var_dump($_POST);
?>

<div class="row my-3">
    <div class="col">
        <h2 class="text-success text-center">Contacta con nosotros</h2>
    </div>
</div>
<form method="POST">
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="nombre-addon1">Nombre</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tu nombre" name="nombre" aria-label="nombre" aria-describedby="nombre-addon">
            </div>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="apellidos-addon">Apellidos</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tus apellidos" name="apellidos" aria-label="Apellidos" aria-describedby="apellidos-addon">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="email-addon">@ Email</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tu email" name="email" aria-label="email" aria-describedby="email-addon">
            </div>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="telefono-addon">Teléfono</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tu teléfono de contacto" name="telefono" aria-label="telefono" aria-describedby="telefono-addon">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-group col mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Mensaje</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" name="mensaje" placeholder="Escribe aquí el mensaje que nos quieres hacer llegar"></textarea>
        </div>
    </div>
    <div class="row mb-5 ">
        <div class="col px-3 d-flex justify-content-center">
            <button class="btn btn-outline-success col-4" type="submit" id="contacto" name="contacto">Enviar mensaje</button>
        </div>
    </div>

</form>

<div class="row">
    <div class="col mapaContacto" id="map"></div>
</div>