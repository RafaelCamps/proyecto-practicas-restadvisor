<?php
    
require_once 'conexion.php';


class RestaurantesModel{

 static public function listarRestaurantesMdl(){

    $consulta = Conexion::conectar()->prepare("SELECT * FROM restaurantes");
    $consulta->execute();
    $resultado = $consulta->fetchAll();

    return $resultado;

 } 

}
