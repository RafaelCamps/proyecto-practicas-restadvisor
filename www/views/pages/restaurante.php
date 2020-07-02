<?php

echo '<br><br><br>';
$id = $_GET['restaurante'];

$restaurante = RestaurantesController::mostrarDatosRestaurante($id);

//var_dump($restaurante)

?>
<h2><?= $restaurante['nombre']; ?></h2>

<a class="btn btn-outline-danger" href="index.php">Atrás</a>