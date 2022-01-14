<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Página no encontrada</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
    <!-- APP CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/styles.css'); ?>">
</head>
<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">404</span>
                    <div class="mb-4 lead">La página que buscas no ha sido encontrada...</div>
                    <a href="<?php echo url('/'); ?>" class="btn btn-link">Volver al inicio</a>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo asset('js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
