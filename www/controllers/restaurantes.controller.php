<?php

class RestaurantesController{

    static public function listarRestaurantesCtrl($filtros){

        $resultado = RestaurantesModel::listarRestaurantesMdl($filtros);
        return $resultado;

    }

    static public function mostrarDatosRestaurante($id){

        $resultado = RestaurantesModel::mostrarRestauranteMdl($id);

        return $resultado;

    }


}


?>