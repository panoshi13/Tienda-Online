<div class="container cuadrado">
    <?php if (isset($var)) : ?>
        <h1 class="text-center">Editar Producto</h1>
        <?php $ruta = base_url . "producto/save&id=".$product->id; ?>
    <?php else : ?>
        <h1 class="text-center">Registrar Producto</h1>
        <?php $ruta = base_url . "producto/save"; ?>
    <?php endif ?>

    <?php if (isset($_SESSION['fail-producto'])) : ?>
        <p class="text-danger text-center">Digite todos los valores correctamente</p>
    <?php endif ?>
    <div class="bloque-3">
        <form action="<?= $ruta ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="nombre" value="<?= isset($product) ?  $product->nombre : '' ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3" placeholder="Ingrese la descripcion"><?= isset($product) ?  $product->descripcion : '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Precio</label>
                <input type="number" value="<?= isset($product) ?  $product->precio : '' ?>" name="precio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el precio">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagen</label>
                <?php if (isset($product) && !empty($product->imagen)) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>">
                <?php endif?>
                <input type="file" name="imagen" class="form-control-file mt-2" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input type="number" value="<?= isset($product) ?  $product->stock : '' ?>" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el stock">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <?php Utils::unSessions('fail-producto') ?>
    </div>
</div>