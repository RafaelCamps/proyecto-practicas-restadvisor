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
}
