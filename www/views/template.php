<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestAdvisor - Guía de restaurantes</title>
    <link rel="icon" id="favicon" href="public/img/logos/icono-verde.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/plugins/fontawesome5/css/all.min.css">
    <link rel="stylesheet" href="../public/css/mystyles.css">

    <script src="public/js/userPosition.js"></script>

</head>

<body>

    <!-- CONTENIDO DEL FRONT -->
    <?php
    if (isset($_GET['registro'])) {
        //Mostramos el formulario de registro
        include_once 'views/pages/registro.php';
    } elseif (isset($_GET['login'])) {
        //Mostramos el formulario de login
        include_once 'views/pages/login.php';
    } elseif (isset($_GET['logout'])) {
        //Mostramos el formulario de login
        include_once 'views/pages/logout.php';
    } elseif (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
        //Mostramos el back
    } else {
        //Mostramos el front

        include_once 'views/components/header.php';
    ?>
        <div class="content container mt-5 py-3 bg-light">
            <?php
            if (isset($_GET['restaurante'])) {
                include_once 'views/pages/restaurante.php';
            } elseif (isset($_GET['pagina'])) {
                if (
                    $_GET['pagina'] == "contacto" ||
                    $_GET['pagina'] == "nosotros"
                ) {
                    include_once 'views/pages/' . $_GET['pagina'] . '.php';
                }
            } else {
                include_once 'views/pages/main.php';
            }
            ?>
        </div>
    <?php
        include_once 'views/components/footer.php';
    }
    ?>


    <!-- Si estamos en el front y tenemos un listado de restaurantes, con esto crearemos la variable que contendrá el JSON -->
    <?php if (isset($restaurantes)) : ?>

        <script>
            var restaurantes = JSON.parse(JSON.stringify(<?= RestaurantesController::listadoRestaurantesMapa($filtros); ?>));
            //console.log(restaurantes);
        </script>

    <?php endif ?>

    <!-- CONTENIDO DEL BACK -->



    <?php if ($mapa) : ?>
        <!-- GOOGLE Maps -->
        <script src="public/js/maps.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQWdqdCDlzNSmfaX4ph_U8Z5ha7y-xV6U&callback=initMap">
        </script>
        <!-- Notifier.js -->
    <?php endif; ?>
    <script src="public/plugins/NotifierJs/Notifier.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>