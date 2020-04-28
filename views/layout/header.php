<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Fire Store</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/59b3220ebb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
</head>

<body>
    <!--CABCEERA-->
    <nav class="cabecera-color navbar navbar-expand-lg navbar-dark p-4 ">
        <div class="container">
            <a href="<?= base_url ?>"><img src="<?= base_url ?>assets/img/logo.jpg" alt="logo black fire" class="tamaño"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-2">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url ?>">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url ?>producto/productos">Productos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Preguntas Frecuentes</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url ?>carrito/index"><i class="fas fa-cart-plus"></i></a>
                    </li>
                    <li class="nav-item active">
                        <?php $carrito = Utils::statsCarrito()?>
                        <div class="bg-dark rounded-circle mt-2 pr-2 pl-2 text-light" href="#"><?=$carrito['count']?></div>
                    </li>
                    <?php if (!isset($_SESSION['verify'])) : ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url ?>usuario/login">Iniciar Sesion</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url ?>usuario/registrar">Registrarse</a>
                        </li>
                    <?php elseif (isset($_SESSION['verify']) && isset($_SESSION['admin'])) : ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Hola, <?= $_SESSION['verify']->nombre ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Carrito</a>
                                <a class="dropdown-item" href="<?= base_url ?>producto/gestion">Gestionar Productos</a>
                                <a class="dropdown-item" href="<?= base_url ?>producto/">Gestionar Pedidos</a>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/logout">Cerrar Sesion</a>
                            </div>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hola, <?= $_SESSION['verify']->nombre ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url ?>carrito/index">Carrito</a>
                                <a class="dropdown-item" href="#">Mis pedidos</a>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/logout">Cerrar Sesion</a>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>