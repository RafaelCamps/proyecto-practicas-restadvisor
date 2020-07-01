<?php

require_once 'conexion.php';


class RestaurantesModel
{

    static public function listarRestaurantesMdl($filtros)
    {
        if (empty($filtros['nombre']) && empty($filtros['localidad']) && empty($filtros['precio']) && empty($filtros['tipo_cocina'])) {
            $consulta = Conexion::conectar()->prepare("SELECT id_restaurante, nombre, localidad, precio, valoracion, telefono, imagen_principal  FROM restaurantes ORDER BY valoracion DESC LIMIT 5");
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            return $resultado;
        } else {

            $nombre = "%" . $filtros['nombre'] . "%";
            $localidad = "%" . $filtros['localidad'] . "%";
            $precio = $filtros['precio'];
            $tipo_cocina = "%" . $filtros['tipo_cocina'] . "%";
            $orden = $filtros['orden'];

            //echo 'Filtros recibidos en Model:<br>';
            //var_dump($filtros);

            $sql = "SELECT id_restaurante, nombre, localidad, precio, valoracion, telefono, imagen_principal FROM restaurantes WHERE ";

            if ($nombre != "%%") {
                $sql .= "nombre LIKE :nombre ";
            }

            if ($localidad != "%%") {
                if ($nombre != "%%") {
                    $sql .= " AND localidad LIKE :localidad";
                } else {
                    $sql .= "localidad LIKE :localidad";
                }
            }

            if ($precio != "") {
                if (($nombre == "%%") && ($localidad == "%%")) {
                    $sql .= "precio = :precio";
                } else {
                    $sql .= " AND precio = :precio";
                }
            }

            if ($tipo_cocina != "%%") {
                if (($nombre == "%%") && ($localidad == "%%") && ($precio == "")) {
                    $sql .= "tipo_cocina LIKE :tipo_cocina";
                } else {
                    $sql .= " AND tipo_cocina LIKE :tipo_cocina";
                }
            }

            $sql .= " ORDER BY :orden";


            // echo "<br> La consulta SQL es: <br> $sql";

            $consulta = Conexion::conectar()->prepare($sql);
            if ($nombre != "%%") {
                $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            }
            if ($localidad != "%%") {
                $consulta->bindParam(':localidad', $localidad, PDO::PARAM_STR);
            }
            if ($precio != "") {
                $consulta->bindParam(':precio', $precio, PDO::PARAM_STR);
            }
            if ($tipo_cocina != "%%") {
                $consulta->bindParam(':tipo_cocina', $tipo_cocina, PDO::PARAM_STR);
            }
            $consulta->bindParam(':orden', $orden, PDO::PARAM_STR);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            return $resultado;
        }
    }
}
