<?php

class ComentariosController
{

    /*======================================================================================
        Función para solicitar la inserción de nuevos registros en la tabla comentarios
    ======================================================================================*/

    static public function crearComentarioCtrl($datos)
    {

        $datos['usuario'] = $_SESSION['id_usuario'];

        $respuesta = ComentariosModel::crearComentarioMdl($datos);

        return $respuesta;
    }

    /*===============================================================
        Función para solicitar datos de la tabla Comentarios
    =================================================================*/

    static public function obtenerComentariosCtrl($restaurante)
    {
        $comentarios = ComentariosModel::obtenerComentariosMdl($restaurante);

        return $comentarios;
    }




    /*===============================================================
        Función para solicitar el borrado de un comentario
    =================================================================*/
}
