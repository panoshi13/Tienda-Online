<div class="container cuadro">
    <h1 class="text-center">Iniciar Sesion</h1>
    <?php if (isset($_SESSION['error-login'])) : ?>
        <p class="text-center text-danger"><?= $_SESSION['error-login'] ?></p>
    <?php endif ?>
    <div class="bloque-3">
        <form action="<?= base_url ?>usuario/indentify" method="POST">
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
        <?php Utils::unSessions('error-login') ?>
    </div>
</div>