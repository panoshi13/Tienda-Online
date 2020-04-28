<div class="container main11">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">IMAGEN</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRECIO</th>
                <th scope="col">UNIDADES</th>
                <th scope="col">TOTAL</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carrito as $indice => $elemento) : ?>
                <?php $producto = $elemento['producto']; ?>
                <tr>
                    <th scope="row"><img class="carrito-producto" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"></th>
                    <td class="align-middle"><?= $producto->nombre ?></td>
                    <td class="align-middle"><?= $producto->precio ?></td>
                    <td class="align-middle">
                        <div class="con">
                            <div class="plus"><a href="<?= base_url ?>carrito/up&id=<?= $producto->id ?>">+</a></div>
                            <div><?= $elemento['unidades'] ?></div>
                            <div class="plus"><a href="<?= base_url ?>carrito/down&id=<?= $producto->id ?>">-</a></div>
                        </div>
                    </td>
                    <td class="align-middle"><?= $producto->precio * $elemento['unidades'] ?></td>
                    <td class="align-middle"><a type="button" href="<?= base_url ?>carrito/borrar&id=<?= $producto->id ?>" class="btn btn-primary"><i class="far fa-trash-alt"></i></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="text-right mr-5">
        <?php $carrito = Utils::statsCarrito() ?>
        <strong >Monto Total: S/. </strong> <strong><?= $carrito['total'] ?></strong> &nbsp;&nbsp;
        <a href="<?= base_url ?>pedido/registrar?>" type="button" class="btn btn-success">Confirmar</a>
    </div>
</div>