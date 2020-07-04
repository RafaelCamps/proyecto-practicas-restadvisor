    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-2 pt-2 pb-3">
        <?php for ($i = 0; $i < count($restaurantes); $i++) : ?>
            <div href="#" class="col mb-4">
                <div class="card h-100 ficha shadow">
                    <img src="./public/img/<?= $restaurantes[$i]['id_restaurante'] . "/" . $restaurantes[$i]['imagen_principal'];  ?>" class="card-img-top img-fluid img-card" alt="...">
                    <div class="card-body">
                        <a class="stretched-link text-decoration-none" href="index.php?restaurante=<?= $restaurantes[$i]['id_restaurante']; ?>">
                            <h5 class="card-title text-center"><?= $restaurantes[$i]['nombre']; ?></h5>
                        </a>
                        <p class="text-secondary text-center"><i class="fas fa-map-marked-alt mr-2"></i><?= $restaurantes[$i]['localidad']; ?></p>
                        <div class="row text-center">
                            <div class="col">
                                <p class="text-secondary"><i class="fas fa-money-bill-wave mr-2"></i> Precio: <span class="text-success"><?= mostrarEuros($restaurantes[$i]['precio']); ?></span> </p>
                            </div>

                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <p class="text-secondary">Valoración: <span class="text-warning"><?= mostrarEstrellas($restaurantes[$i]['valoracion']); ?></span> </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info btn-block" href="tel:+<?= $restaurantes[$i]['telefono']; ?>"><i class="fas fa-phone-volume mr-2"></i> Llamar por teléfono</a>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>