<?php

$nombre = "";
$email = "";
$pass = "";
$errorNombre = "";
$errorEmail = "";
$errorPass = "";
$obligatorio = "* Campo requerido";

//var_dump($_POST);

if (isset($_POST['registro'])) {
    $nombre = $_POST['registroNombre'];
    $email = $_POST['registroEmail'];
    $pass = $_POST['registroPass'];

    // echo "dentro del if";
    // echo "Valor de \$nombre = $nombre, valor de \$email = $email, valor de \$pass = $pass";

    if (!empty($nombre)) {
        if (!preg_match("/^[a-zA-Z\sáéíóúÁÉÍÓÚ]+$/", $nombre)) {
            $errorNombre = "¡El nombre solamente puede contener letras!";
        }
    } else {
        $errorNombre = $obligatorio;
    }

    if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMail = "El email no es válido, por favor compruébalo!";
        }
    } else {
        $errorEmail = $obligatorio;
    }

    if (!empty($pass)) {
        $pattern = "^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$^";
        if (!preg_match($pattern, $pass)) {
            $errorPass = "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula.";
        }
    } else {
        $errorPass = $obligatorio;
    }

    if ($errorNombre == "" && $errorEmail == "" && $errorPass == "") {

        $datos = array(
            "nombre" => $nombre,
            "email" => $email,
            "pass" => $pass
        );


        $usuarioCreado = UsuariosController::crearUsuarioCtrl($datos);

        if ($usuarioCreado == "ok") {
            echo '<script>
             document.addEventListener("DOMContentLoaded", function(event) {
        
                Notifier.success("Ya puedes acceder ingresando tu email y contraseña","Usuario creado con éxito");
            });
            setTimeout(function(){ window.location = "index.php"; }, 2000);
            </script>';
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
            <h3 class="h3 mb-3 font-weight-normal">Regístrate</h3>
        </div>

        <div class="form-label-group">
            <input type="text" id="registroNombre" name="registroNombre" class="form-control" placeholder="User name" autofocus value="<?= $nombre; ?>">
            <label for="registroNombre">Nombre</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($errorNombre != "") ? $errorNombre : ""; ?></small>
        </div>

        <div class="form-label-group">
            <input type="email" id="registroEmail" name="registroEmail" class="form-control" placeholder="Correo electrónico" value="<?= $email; ?>">
            <label for="registroEmail">Email</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($errorEmail != "") ? $errorEmail : ""; ?></small>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" name="registroPass" class="form-control" placeholder="Password" value="<?= $pass; ?>">
            <label for="inputPassword">Password</label>
            <small class="form-text text-danger mb-3 pl-3"><?= ($errorPass != "") ? $errorPass : ""; ?></small>
        </div>


        <button class="btn btn-lg btn-primary btn-block" name="registro" type="submit">Crear nuevo usuario</button>
        <p class="mt-4 mb-3 text-muted text-center">¿Ya tienes una cuenta? <a class="ml-2" href="#">Accede con tu usuario</a> </p>

    </form>

</div>