<?php

class RestaurantesController{

    static public function listarRestaurantesCtrl($filtros){

        $resultado = RestaurantesModel::listarRestaurantesMdl($filtros);
        return $resultado;

    }

    static public function mostrarDatosRestauranteCtrl($id){

        $resultado = RestaurantesModel::mostrarRestauranteMdl($id);

        return $resultado;

    }

    static public function listarLocalidadesCtrl(){

        $resultado = RestaurantesModel::listarLocalidades();

        return $resultado;

    }

}


?>