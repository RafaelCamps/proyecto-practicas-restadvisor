<?php

require_once 'conexion.php';

class ComentariosModel
{

    /*===============================================================
        CREATE - Insertar nuevos registros en la tabla comentarios
    =================================================================*/

    static public function crearComentarioMdl($datos)
    {

        // echo "<br>Datos recibidos en el model: <br>";
        // var_dump($datos);
        $consulta = Conexion::conectar()->prepare("INSERT INTO comentarios (id_restaurante, id_user, titulo, valoracion, comentario) VALUES (:id_restaurante, :id_user, :titulo, :valoracion, :comentario)");
        $consulta->bindParam(":id_restaurante", $datos['restaurante'], PDO::PARAM_INT);
        $consulta->bindParam(":id_user", $datos['usuario'], PDO::PARAM_INT);
        $consulta->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $consulta->bindParam(":valoracion", $datos['valoracion'], PDO::PARAM_INT);
        $consulta->bindParam(":comentario", $datos['comentario'], PDO::PARAM_STR);


        if ($consulta->execute()) {
            return "ok";
        } else {
            return "Error: " . Conexion::conectar()->errorInfo();
        }
        $consulta = null;
    }

    /*===============================================================
        READ - Leer datos de la tabla comentarios
    =================================================================*/

    /* ===== Leer todos los registros ==== */

    /* ===== Leer todos los datos de un usuario ==== */

    static public function obtenerComentariosMdl($restaurante)
    {

        $consulta = Conexion::conectar()->prepare("SELECT * FROM comentarios WHERE id_restaurante = :restaurante");
        $consulta->bindParam(":restaurante", $restaurante, PDO::PARAM_STR);
        $consulta->execute();
        //var_dump($consulta);

        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    /*===============================================================
        UPDATE - Actualizar registro en la tabla usuarios
    =================================================================*/


    /*===============================================================
        DELETE - Borrar registros de la tabla usuarios
    =================================================================*/
}
