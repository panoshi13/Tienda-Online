<div class="container w-75 main11">
    <h1 class="text-center">Pedido</h1>
    <a href="<?=base_url?>carrito/index">Ver todos los los productos y el precio total del pedido</a>
    <form action="<?=base_url?>pedido/guardar" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Direccion</label>
            <input type="text" class="form-control" placeholder="direccion">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Distrito</label>
            <input type="text" class="form-control" placeholder="distrito">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Departamento</label>
            <input type="text" class="form-control" placeholder="departamento">
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
</div>