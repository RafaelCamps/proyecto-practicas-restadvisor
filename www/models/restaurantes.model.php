<?php

require_once 'conexion.php';


class RestaurantesModel
{

    static public function listarRestaurantesMdl($filtros)
    {
        if ($filtros == "") {
            $consulta = Conexion::conectar()->prepare("SELECT * FROM restaurantes");
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            return $resultado;
        } else {

            $campo = $filtros['campo'];
            echo 'campo en model = ' . $campo . '<br>';
            $busqueda = "%" . $filtros['buscar'] . "%";
            echo 'buscar en model = ' . $busqueda . '<br>';
            
            if ($campo == "nombre") {
                $sql = "SELECT * FROM restaurantes WHERE nombre LIKE :busqueda";
            } elseif ($campo == "tipo_cocina") {
                $sql = "SELECT * FROM restaurantes WHERE tipo_cocina LIKE :busqueda";
            } elseif ($campo == "localidad") {
                $sql = "SELECT * FROM restaurantes WHERE localidad LIKE :busqueda";
            } elseif ($campo == "precio") {
                $sql = "SELECT * FROM restaurantes WHERE precio LIKE :busqueda";
            } else {
                $resultado = "Valor no permitido";
                return $resultado;
            }

            $consulta = Conexion::conectar()->prepare($sql);
            $consulta->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            return $resultado;
        }
    }
}
