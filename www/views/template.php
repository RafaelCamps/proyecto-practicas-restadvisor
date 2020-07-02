<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RestAdvisor - Guía de restaurantes</title>
    <link rel="icon" id="favicon" href="public/img/logos/icono-verde.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/mystyles.css">

</head>

<body>

    <!-- CONTENIDO DEL FRONT -->
    <?php
    include_once 'views/components/header.php';
    ?>
    <div class="content container mt-5 bg-light">
        <?php
        if (isset($_GET['restaurante'])) {
            include_once 'views/pages/restaurante.php';
        } else {
            include_once 'views/pages/main.php';
        }
        ?>
    </div>
    <?php
    include_once 'views/components/footer.php';
    ?>

    <!-- CONTENIDO DEL BACK -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>