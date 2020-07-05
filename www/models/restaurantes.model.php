<?php

require_once 'conexion.php';


class RestaurantesModel
{

    /*===============================================================
        CREATE - Insertar nuevos registros en la tabla restaurantes
    =================================================================*/





    /*===============================================================
        READ - Leer datos de la BBBDD
    =================================================================*/

    /* Función para listar los restaurantes */

    static public function listarRestaurantesMdl($filtros)
    {
        if (empty($filtros['nombre']) && empty($filtros['localidad']) && empty($filtros['precio']) && empty($filtros['tipo_cocina']) && empty($filtros['orden'])) {
            $consulta = Conexion::conectar()->prepare("SELECT id_restaurante, nombre, localidad, precio, valoracion, telefono, latitud, longitud, imagen_principal  FROM restaurantes ORDER BY valoracion DESC LIMIT 5");
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

            $sql = "SELECT id_restaurante, nombre, localidad, precio, valoracion, telefono, latitud, longitud, imagen_principal FROM restaurantes ";

            if ($nombre != "%%") {
                $sql .= "WHERE nombre LIKE :nombre ";
            }

            if ($localidad != "%%") {
                if ($nombre != "%%") {
                    $sql .= " AND localidad LIKE :localidad";
                } else {
                    $sql .= "WHERE localidad LIKE :localidad";
                }
            }

            if ($precio != "") {
                if (($nombre == "%%") && ($localidad == "%%")) {
                    $sql .= "WHERE precio = :precio";
                } else {
                    $sql .= " AND precio = :precio";
                }
            }

            if ($tipo_cocina != "%%") {
                if (($nombre == "%%") && ($localidad == "%%") && ($precio == "")) {
                    $sql .= "WHERE tipo_cocina LIKE :tipo_cocina";
                } else {
                    $sql .= " AND tipo_cocina LIKE :tipo_cocina";
                }
            }

            // $sql .= " ORDER BY :orden";
            $sql .= " ORDER BY $orden";

            //echo "<br> La consulta SQL es: <br> $sql";

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
            //$consulta->bindParam(':orden', $orden, PDO::PARAM_STR);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            return $resultado;
        }
    }

    /* Funcion para recoger todos los datos de 1 restaurante */

    static public function mostrarRestauranteMdl($id)
    {

        $consulta = Conexion::conectar()->prepare("SELECT * FROM restaurantes WHERE id_restaurante = :id");
        $consulta->bindParam(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch();

        return $resultado;
    }

    /* Función para listar las localidades */

    static public function listarLocalidades()
    {

        $consulta = Conexion::conectar()->prepare("SELECT DISTINCT localidad FROM restaurantes");
        $consulta->execute();
        $resultado = $consulta->fetchAll();

        return $resultado;
    }
}
