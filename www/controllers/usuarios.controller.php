<?php

class UsuariosController
{


    /*===============================================================
        Función para controlar la creación de nuevos usuarios
    =================================================================*/

    static public function crearUsuarioCtrl($datos)
    {

        //echo "Dentro de la función crearUsuarioCtrl <br>";
        $token = md5($datos['nombre'] . "+" . $datos['email']);
        //echo "token = $token <br>";
        $datos['token'] = $token;

        //Ciframos la contraseña
        $pasSinCifrar = $datos['pass'];
        $datos['pass'] = password_hash($pasSinCifrar, PASSWORD_DEFAULT);

        $datos['tipo'] = 1;
        $datos['imagen'] = "user-default.png";


        // echo "<br>";
        // var_dump($datos);

        $resultado = UsuariosModel::crearUsuarioMdl($datos);

        return $resultado;
    }

    /*===============================================================
        Función para leer registros de la tabla usuarios
    =================================================================*/

    static public function obtenerUsuarioCtrl($datos)
    {

        $email = $datos['email'];
        $pass = $datos['pass'];

        $usuario = UsuariosModel::obtenerUsuariosMdl($email);
        // echo "<br>Usuario:<br>";
        // var_dump($usuario);

        $emailUsr = $usuario['email'];
        $passUsr = $usuario['pass'];

        if (($email == $emailUsr) && (password_verify($pass, $passUsr))) {
            $usuarioValido = "ok";
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['tipo'] = $usuario['tipo'];
            $_SESSION['token'] = $usuario['token'];
            $_SESSION['imagen'] = $usuario['imagen'];
        } else {
            $usuarioValido = "error";
        }

        return $usuarioValido;
    }
}
