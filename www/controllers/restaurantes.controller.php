<?php

class RestaurantesController{

    static public function listarRestaurantesCtrl($filtros){

        $resultado = RestaurantesModel::listarRestaurantesMdl($filtros);
        return $resultado;

    }

}


?>