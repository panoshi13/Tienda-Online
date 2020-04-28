<div class="container cuadro">
    <h1 class="text-center">Registrar</h1>
    <?php if (isset($_SESSION['register'])) : ?>
        <p class="text-center text-success"><?= $_SESSION['register'] ?></p>
    <?php elseif (isset($_SESSION['failed'])) : ?>
        <?php if (is_array($_SESSION['failed'])) : ?>
            <?php foreach ($_SESSION['failed'] as $errores) : ?>
                <p class="text-center text-danger"><?= $errores ?></p>
            <?php endforeach ?>
        <?php else : ?>
            <p class="text-center text-success"><?= $_SESSION['failed'] ?></p>
        <?php endif ?>
    <?php endif ?>
    <div class="bloque-3">
        <form action="<?= base_url ?>usuario/save" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese Apellido">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="contraseña" class="form-control" id="exampleInputPassword1" placeholder="Ingrese Password">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php Utils::unSession() ?>
    </div>
</div>