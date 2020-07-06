<?php
$mapa = true;
// echo "<br><br><br>";
// var_dump($_POST);

$nombre = "";
$apellidos = "";
$email = "";
$telefono = "";
$mensaje = "";
$error = "";

if (isset($_POST['contacto'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];


    if (!empty($nombre) && !empty($apellidos) && !empty($email) && !empty($telefono) && !empty($mensaje)) {
        include_once './views/components/mailContacto.php';
    } else {
        $error = '* Campo obligatorio';
    }
}

?>

<div class="row my-3">
    <div class="col">
        <h2 class="text-success text-center">Contacta con nosotros</h2>
    </div>
</div>
<form method="POST">
    <div class="row">
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="nombre-addon1">Nombre</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tu nombre" name="nombre" aria-label="nombre" aria-describedby="nombre-addon" value="<?= $nombre;  ?>">
            </div>
            <small class="form-text text-danger mb-3 pl-3"><?= ($nombre == "") ? $error : ""; ?></small>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="apellidos-addon">Apellidos</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tus apellidos" name="apellidos" aria-label="Apellidos" aria-describedby="apellidos-addon" value="<?= $apellidos;  ?>">
            </div>
            <small class="form-text text-danger mb-3 pl-3"><?= ($apellidos == "") ? $error : ""; ?></small>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="email-addon">@ Email</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tu email" name="email" aria-label="email" aria-describedby="email-addon" value="<?= $email;  ?>">
            </div>
            <small class="form-text text-danger mb-3 pl-3"><?= ($email == "") ? $error : ""; ?></small>
        </div>
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="telefono-addon">Teléfono</span>
                </div>
                <input type="text" class="form-control" placeholder="Introduce tu teléfono de contacto" name="telefono" aria-label="telefono" aria-describedby="telefono-addon" value="<?= $telefono;  ?>">
            </div>
            <small class="form-text text-danger mb-3 pl-3"><?= ($telefono == "") ? $error : ""; ?></small>
        </div>
    </div>
    <div class="row  mb-3">
        <div class="col">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mensaje</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" name="mensaje" placeholder="Escribe aquí el mensaje que nos quieres hacer llegar"><?= $mensaje;  ?></textarea>
            </div>
            <small class="form-text text-danger pl-3"><?= ($mensaje == "") ? $error : ""; ?></small>
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