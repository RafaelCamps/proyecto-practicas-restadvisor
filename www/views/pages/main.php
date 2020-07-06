<?php

if (isset($_POST['buscar'])) {

    // Falta la validación!!!
    $filtros = array(
        "nombre" => $_POST['nombre'],
        "localidad" => $_POST['localidad'],
        "precio" => $_POST['precio'],
        "tipo_cocina" => $_POST['tipo_cocina'],
        "orden" => $_POST['orden']
    );
} else {
    $filtros = array(
        "nombre" => "",
        "localidad" => "",
        "precio" => "",
        "tipo_cocina" => "",
        "orden" => ""
    );
}
//echo '<br><br><br>';
$localidades = RestaurantesController::listarLocalidadesCtrl();
$restaurantes = RestaurantesController::listarRestaurantesCtrl($filtros);

$mapa = true;
// echo '<br><br>Post:<br>';
// var_dump($_POST);
// echo '<br><br>Filtros:<br>';
// var_dump($filtros);
// echo '<br><br>Restaurantes:<br>';
// var_dump($restaurantes);
// echo '<br><br>Localidades:<br>';
// var_dump($localidades);

?>

<main px-3>
    <!-- Aquí tenemos el buscador, para filtrar los resultados -->
    <div class="row pt-3 pr-3">
        <div class="col d-flex justify-content-end pt-3">
            <form class="form-inline" method="POST">
                <input class="form-control mt-1 mr-sm-2" name="nombre" value="<?= $filtros['nombre']; ?>" placeholder="Nombre">
                <select class="form-control mt-1 mr-2" name="localidad" id="localidad">
                    <option value="">Localidad</option>
                    <?php for ($i = 0; $i < count($localidades); $i++) : ?>
                        <option value="<?= $localidades[$i]['localidad']; ?>" <?= $filtros['localidad'] == $localidades[$i]['localidad'] ? 'selected' : ""; ?>><?= $localidades[$i]['localidad']; ?></option>
                    <?php endfor; ?>
                </select>
                <select class="form-control mt-1 mr-2" name="precio" id="precio">
                    <option value="">Precio</option>
                    <option value="1" <?= $filtros['precio'] == 1 ? 'selected' : ""; ?>>€</option>
                    <option value="2" <?= $filtros['precio'] == 2 ? 'selected' : ""; ?>>€€</option>
                    <option value="3" <?= $filtros['precio'] == 3 ? 'selected' : ""; ?>>€€€</option>
                    <option value="4" <?= $filtros['precio'] == 4 ? 'selected' : ""; ?>>€€€€</option>
                    <option value="5" <?= $filtros['precio'] == 5 ? 'selected' : ""; ?>>€€€€€</option>
                </select>
                <input class="form-control mt-1 mr-sm-2" name="tipo_cocina" value="<?= $filtros['tipo_cocina']; ?>" type="search" placeholder="Tipo cocina">
                <select class="form-control mt-1 mr-2" name="orden" id="orden">
                    <option value="valoracion DESC" <?= $filtros['orden'] == 'valoracion' ? 'selected' : ""; ?>>por valoración</option>
                    <option value="precio ASC" <?= $filtros['orden'] == 'precio ASC' ? 'selected' : ""; ?>>por precio ascendente</option>
                    <option value="precio DESC" <?= $filtros['orden'] == 'precio DESC' ? 'selected' : ""; ?>>por precio descendente</option>
                </select>
                <button class="btn btn-outline-success mt-1" name="buscar" type="submit"><i class="fas fa-search mr-2"></i> Buscar</button>
            </form>
        </div>

    </div> <!-- Cierre del buscador  -->

    <!-- Nav tabs -->
    <ul class="nav nav-tabs justify-content-end mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Listado restaurantes</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ver en Mapa</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php include_once 'listado.php'; ?>
        </div>
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="mt-2 px-3">
                <div class="form-group row">
                    <label for="distancia">Distancia:</label>
                    <input type="range" class="form-control-range" id="distancia" step="0.5" min="2" max="20" value="10">
                </div>
            </div>
            <div class="mt-2 pt-2 pb-3" id="map"></div>
        </div>

    </div>

</main>