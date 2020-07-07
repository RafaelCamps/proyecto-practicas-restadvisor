<?php

require_once 'conexion.php';

class UsuariosModel
{


    /*===============================================================
        CREATE - Insertar nuevos registros en la tabla usuarios
    =================================================================*/

    static public function crearUsuarioMdl($datos)
    {
        // echo "<br>Datos recibidos en el model: <br>";
        // var_dump($datos);
        $consulta = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre, email, pass, tipo, token, imagen) VALUES (:nombre, :email, :pass, :tipo, :token, :imagen)");
        $consulta->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $consulta->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $consulta->bindParam(":pass", $datos['pass'], PDO::PARAM_STR);
        $consulta->bindParam(":tipo", $datos['tipo'], PDO::PARAM_INT);
        $consulta->bindParam(":token", $datos['token'], PDO::PARAM_STR);
        $consulta->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);

        if ($consulta->execute()) {
            return "ok";
        } else {
            return "Error: " . Conexion::conectar()->errorInfo();
        }
        $consulta = null;
    }

    /*===============================================================
        READ - Leer datos de la tabla usuarios
    =================================================================*/

    /* ===== Leer todos los registros ==== */

    /* ===== Leer todos los datos de un usuario ==== */

    static public function obtenerUsuariosMdl($email)
    {

        $consulta = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE email = :email");
        $consulta->bindParam(":email", $email, PDO::PARAM_STR);
        $consulta->execute();
        var_dump($consulta);

        $resultado = $consulta->fetch();

        return $resultado;
    }

    /*===============================================================
        UPDATE - Actualizar registro en la tabla usuarios
    =================================================================*/


    /*===============================================================
        DELETE - Borrar registros de la tabla usuarios
    =================================================================*/
}
