<?php

$nombre = "";
$email = "";
$pass = "";

if (isset($_POST['registro'])) {
    if (!empty($_POST['registroNombre']) && !empty($_POST['registroNombre']) && !empty($_POST['registroNombre'])) {
        $nombre = $_POST['registroNombre'];
        $email = $_POST['registroNombre'];
        $pass = $_POST['registroNombre'];
    } else {
        $error = "* Campo obligatorio";
    }
}

// if (isset($_POST['email'])) {

//     $email = $_POST['email'];
//     $pass = $_POST['pass'];
//     $usuario = UsuariosController::datosUsuarioCtr($email);

//     if ($usuario['email'] == $email && $usuario['pass'] == $pass) {

//         $_SESSION['nombre'] = $usuario['nombre'];
//         $_SESSION['email'] = $usuario['email'];
//         $_SESSION['tipo'] = $usuario['tipo'];
//         $_SESSION['imagen'] = $usuario['imagen'];
//     } else {
//         $error = "¡Error al conectar, revisa los datos!";
//     }
// }

?>

<div class="login">

    <form class="form-signin" method="POST">
        <div class="text-center mb-4">

            <a class="text-decoration-none" href="index.php">
                <h1 class="mb-3 font-weight-normal"><img src="public/img/logos/logo-redondo.png" alt="" width="200" height="200"></h1>
            </a>
            <h3 class="h3 mb-3 font-weight-normal">Regístrate</h3>
        </div>

        <div class="form-label-group">
            <input type="text" id="registroNombre" name="registroNombre" class="form-control" placeholder="User name" autofocus>
            <label for="registroNombre">Nombre</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($nombre == "") ? $error : ""; ?></small>
        </div>

        <div class="form-label-group">
            <input type="email" id="registroEmail" name="registroEmail" class="form-control" placeholder="Email address">
            <label for="registroEmail">Email</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($email == "") ? $error : ""; ?></small>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password">
            <label for="inputPassword">Password</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($pass == "") ? $error : ""; ?></small>
        </div>
        <!-- <?php if (isset($error)) : ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= $error; ?>
            </div>
        <?php endif ?> -->


        <button class="btn btn-lg btn-primary btn-block" name="registro" type="submit">Crear nuevo usuario</button>
        <p class="mt-4 mb-3 text-muted text-center">¿Ya tienes una cuenta? <a class="ml-2" href="#">Accede con tu usuario</a> </p>

    </form>

</div>