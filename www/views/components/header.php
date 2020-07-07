<nav class="navbar navbar-expand-lg fixed-top shadow navbar-dark bg-dark">
    <a class="navbar-brand text-success" href="index.php">
        <img src="./public/img/logos/icono-verde.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        RestAdvisor
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item  mx-3 active">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mx-3">
                <a class="nav-link" href="index.php?pagina=nosotros">About</a>
            </li>
            <li class="nav-item mx-3 mb-0">
                <a class="nav-link" href="index.php?pagina=contacto">Contacto</a>
            </li>
            <?php if (isset($_SESSION['nombre'])) : ?>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle py-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-header mr-2" src="public/img/users/<?= $_SESSION['imagen']; ?>" alt=""> <span class="text-success"><?= $_SESSION['nombre']; ?></span>
                    </a>
                    <div class="dropdown-menu mt-2 ml-5" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-user-cog mr-2"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="index.php?logout"><i class="fas fa-sign-out-alt mr-2"></i> Salir</a>
                    </div>
                </li>

            <?php else : ?>
                <li class="nav-item mx-2 my-1">
                    <a class="btn btn-outline-success btn-sm pt-1 my-2 my-sm-0" href="index.php?login"> <i class="far fa-user mr-2"></i> Acceder</a>
                </li>
            <?php endif ?>

        </ul>
        <!-- <form class="form-inline my-2 my-lg-0 pr-5">
            <button type="submit">Iniciar Sesión</button>
        </form> -->
    </div>
</nav>