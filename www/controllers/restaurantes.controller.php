<?php

class RestaurantesController{

    static public function listarRestaurantesCtrl($filtro){

        $resultado = RestaurantesModel::listarRestaurantesMdl($filtro);
        return $resultado;

    }

}


?>