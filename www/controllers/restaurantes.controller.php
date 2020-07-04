<?php

class RestaurantesController
{

    static public function listarRestaurantesCtrl($filtros)
    {

        $resultado = RestaurantesModel::listarRestaurantesMdl($filtros);
        return $resultado;
    }

    static public function listadoRestaurantesMapa($filtros)
    {

        $resultado = RestaurantesModel::listarRestaurantesMdl($filtros);
        $listadoRestaurantes = array();

        for ($i = 0; $i < count($resultado); $i++) {

            $listadoRestaurantes[] = array(
                'id_restaurante' => $resultado[$i]['id_restaurante'],
                'nombre' => $resultado[$i]['nombre'],
                'coordenadas' => array(
                    'lat' => $resultado[$i]['latitud'],
                    'lng' => $resultado[$i]['longitud']
                ),
                'imagen' => $resultado[$i]['imagen_principal']
            );
        }


        //var_dump($listadoRestaurantes);



        return json_encode($listadoRestaurantes);
    }

    static public function mostrarDatosRestauranteCtrl($id)
    {

        $resultado = RestaurantesModel::mostrarRestauranteMdl($id);

        return $resultado;
    }

    static public function listarLocalidadesCtrl()
    {

        $resultado = RestaurantesModel::listarLocalidades();

        return $resultado;
    }
}
