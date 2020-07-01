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
// echo '<br><br><br>';
$restaurantes = RestaurantesController::listarRestaurantesCtrl($filtros);

// echo '<br><br>Post:<br>';
// var_dump($_POST);
// echo '<br><br>Filtros:<br>';
// var_dump($filtros);
// echo '<br><br>Restaurantes:<br>';
// var_dump($restaurantes);

function mostrarEuros($num)
{
    $euros = "";
    for ($i = 0; $i < $num; $i++) {
        $euros .= "€";
    }
    return $euros;
}

?>

<div class="content container mt-5 bg-light">
    <div class="row pt-3">
        <div class="col d-flex justify-content-end pt-3">
            <form class="form-inline" method="POST">
                <input class="form-control mr-sm-2" name="nombre" value="<?= $filtros['nombre']; ?>" placeholder="Nombre">
                <input class="form-control mr-sm-2" name="localidad" value="<?= $filtros['localidad']; ?>" placeholder="Localidad">
                <select class="form-control mr-2" name="precio" id="precio">
                    <option value="">Precio</option>
                    <option value="1" <?= $filtros['precio'] == 1 ? 'selected' : ""; ?>>€</option>
                    <option value="2" <?= $filtros['precio'] == 2 ? 'selected' : ""; ?>>€€</option>
                    <option value="3" <?= $filtros['precio'] == 3 ? 'selected' : ""; ?>>€€€</option>
                    <option value="4" <?= $filtros['precio'] == 4 ? 'selected' : ""; ?>>€€€€</option>
                    <option value="5" <?= $filtros['precio'] == 5 ? 'selected' : ""; ?>>€€€€€</option>
                </select>
                <input class="form-control mr-sm-2" name="tipo_cocina" value="<?= $filtros['tipo_cocina']; ?>" type="search" placeholder="Tipo cocina">
                <select class="form-control mr-2" name="orden" id="orden">
                    <option value="valoracion" <?= $filtros['orden'] == 'valoracion' ? 'selected' : ""; ?>>por valoración</option>
                    <option value="precio ASC" <?= $filtros['orden'] == 'precio ASC' ? 'selected' : ""; ?>>por precio ascendente</option>
                    <option value="precio DESC" <?= $filtros['orden'] == 'precio DESC' ? 'selected' : ""; ?>>por precio descendente</option>
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" name="buscar" type="submit">Buscar</button>
            </form>
        </div>

    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 pt-5 pb-3">
        <?php for ($i = 0; $i < count($restaurantes); $i++) : ?>
            <div href="#" class="col mb-4">
                <div class="card h-100">
                    <img src="./public/img/<?= $restaurantes[$i]['id_restaurante'] . "/" . $restaurantes[$i]['imagen_principal'];  ?>" class="card-img-top img-fluid img-card" alt="...">
                    <div class="card-body">
                        <a class="stretched-link text-decoration-none" href="#">
                            <h5 class="card-title text-center"><?= $restaurantes[$i]['nombre']; ?></h5>
                        </a>
                        <p class="text-secondary"><?= $restaurantes[$i]['localidad']; ?></p>
                        <p class="text-success">Precio: <?= mostrarEuros($restaurantes[$i]['precio']); ?></p>
                        <p class="text-secondary">Valoración: <?= $restaurantes[$i]['valoracion']; ?></p>

                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info btn-block" href="tel:+<?= $restaurantes[$i]['telefono']; ?>">Llamar por teléfono</a>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

</div>