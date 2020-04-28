<?php
require_once 'models/producto.php';

class  productoController
{
    public function index()
    {
        require_once "views/indice/section.php";
        require_once "views/indice/main.php";
        require_once "views/indice/contacto.php";
    }

    public function productos()
    {
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once "views/producto/destacados.php";
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once "views/producto/crear.php";
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once "views/producto/gestion.php";
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            if ($nombre && $descripcion && $precio && $stock) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);

                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/PNG" || $mimetype == "image/gif") {
                        if (!is_dir("uploads/images")) {
                            mkdir("uploads/images", 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], "uploads/images/" . $filename);
                        $producto->setImagen($filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $productoss = $producto->edit();
                } else {
                    $productos = $producto->guardar();
                }

                if ($productos && is_object($producto)) {
                    $_SESSION['producto'] = "$productos";
                } elseif ($productoss) {
                    $_SESSION['productos'] = "$productos";
                } else {
                    $_SESSION['error-producto'] = "error";
                }
            } else {
                $_SESSION['fail-producto'] = "error";
            }
        }
        header("location:" . base_url . "producto/gestion");
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $producto->delete($id);
        }
        header("location:" . base_url . "producto/gestion");
    }

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $product = $producto->getOne();
            $var = true;
            require_once "views/producto/crear.php";
        }
    }
}
