<?php

class RestaurantesController{

    static public function listarRestaurantesCtrl(){

        $resultado = RestaurantesModel::listarRestaurantesMdl();
        return $resultado;

    }

}


?>