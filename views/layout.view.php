<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi Blog con PHP POO</title>
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap-icons.css'); ?>">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css'); ?>">
    <!-- Custom styles for this template -->
    <link href="<?php echo asset('css/navbar-top-fixed.css'); ?>" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            padding-top: 4.5rem;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- APP CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/styles.css'); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo url('/'); ?>">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo url('/'); ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('posts'); ?>">Artículos</a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['auth'])): ?>
                    <ul class="navbar-nav ml-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo url('admin/posts'); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo url('logout'); ?>">Cerrar sesión</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="container">
        <?php echo $content; ?>
    </main>
    <script src="<?php echo asset('js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
