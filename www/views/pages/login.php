<?php

$email = "";
$pass = "";
$error = "";
$errorMail = "";
$errorPass = "";
$obligatorio = "* Campo requerido";

//var_dump($_POST);

if (isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    // echo "dentro del if";
    // echo "Valor de \$nombre = $nombre, valor de \$email = $email, valor de \$pass = $pass";



    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMail = "El email no es válido, por favor compruébalo!";
        }
    } else {
        $errorMail = $obligatorio;
    }

    if (!empty($pass)) {
        $pattern = "/^[a-zA-Z0-9]+$/";
        if (!preg_match($pattern, $pass)) {
            $errorPass = "La contraseña no puede contener caracteres especiales";
        }
    } else {
        $errorPass = $obligatorio;
    }

    if ($errorMail == "" && $errorPass == "") {

        $datos = array(

            "email" => $email,
            "pass" => $pass
        );


        $usuarioValido = UsuariosController::obtenerUsuarioCtrl($datos);

        if ($usuarioValido == "ok") {
            echo '<script>
                window.location = "index.php"
            </script>';
        } else {
            $error = "¡Error al conectar, revisa los datos!";
        }
    }
}

?>

<div class="login">

    <form class="form-signin" method="POST">
        <div class="text-center mb-4">

            <a class="text-decoration-none" href="index.php">
                <h1 class="mb-3 font-weight-normal"><img src="public/img/logos/logo-redondo.png" alt="" width="200" height="200"></h1>
            </a>
            <h3 class="display-4 mb-3 text-success font-weight-normal">Bienvenid@</h3>
        </div>

        <div class="form-label-group">
            <input type="text" id="registroEmail" name="loginEmail" class="form-control" placeholder="Correo electrónico" value="<?= $email; ?>">
            <label for="registroEmail">Email</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($errorMail != "") ? $errorMail : ""; ?></small>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" name="loginPass" class="form-control" placeholder="Password" value="<?= $pass; ?>">
            <label for="inputPassword">Password</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($errorPass != "") ? $errorPass : ""; ?></small>
        </div>
        <?php if ($error != "") : ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= $error; ?>
            </div>
        <?php endif ?>

        <button class="btn btn-lg btn-success btn-block" name="login" type="submit">Acceder</button>
        <p class="mt-4 mb-3 text-muted text-center">¿No tienes una cuenta? <a class="ml-2 text-success" href="index.php?registro">Regístrate</a> </p>

    </form>

</div>