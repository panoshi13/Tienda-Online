<div class="container mt-3 main11">
    <h1 class="text-center">Gestion de Productos</h1>
    <a href="<?= base_url ?>producto/crear" class="btn btn-success mb-3">Agregar Producto</a>
    <?php if (isset($_SESSION['producto'])) : ?>
        <p class="text-success text-left">El producto fue registrado con exito</p>
    <?php elseif (isset($_SESSION['error-producto'])) : ?>
        <p class="text-danger text-left">Error al registrar producto</p>
    <?php elseif (isset($_SESSION['productos'])) : ?>
        <p class="text-success text-left">El producto fue editado con exito</p>
    <?php endif ?>
    <table class="table table-dark text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">PRECIO</th>
                <th scope="col">STOCK</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product =  $productos->fetch_object()) : ?>
                <tr>
                    <th><?= $product->id ?></th>
                    <td><?= $product->nombre ?></td>
                    <td><?= $product->descripcion ?></td>
                    <td><?= $product->precio ?></td>
                    <td><?= $product->stock ?></td>
                    <td> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="far fa-trash-alt"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-dark">Mensaje</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <p>Seguro quieres eliminar el producto</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?= base_url ?>producto/eliminar&id=<?= $product->id ?>" class="btn btn-default btn-danger">Confirmar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <a type="button" href="<?= base_url ?>producto/editar&id=<?= $product->id ?>" class="btn btn-info btn-lg"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
    <?php Utils::unSessions('producto') ?>
    <?php Utils::unSessions('productos') ?>
    <?php Utils::unSessions('error-producto') ?>
</div>