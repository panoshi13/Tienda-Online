<main class="main">
    <div class="container text-center pt-3 pb-5">
        <h1 class="text-light pb-3">Productos</h1>
        <div class="row">
            <div class="card-columns">
                <?php while ($pro = $productos->fetch_object()) : ?>
                    <div class="card bg-secondary">
                        <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" class="card-img-top img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pro->nombre ?></h5>
                            <label for="precio">Precio: </label><span class="precio-verde"><?= $pro->precio ?></span><br>
                                <?php if (Utils::carritoClick($pro->id)) : ?>
                                    <a href="<?= base_url ?>carrito/index" class="btn btn-outline-dark">Ir a la cesta</a>
                                <?php else : ?>
                                    <a href="<?= base_url ?>carrito/add&id=<?= $pro->id ?>" class="btn btn-danger">Añadir a la cesta</a>
                                <?php endif ?>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>
    </div>
</main>