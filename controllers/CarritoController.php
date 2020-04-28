<?php
require_once 'models/producto.php';
class carritoController
{

    public function index()
    {
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        require_once "views/carrito/index.php";
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header("location:" . base_url . "producto/productos");
        }
        //en caso el carrito haya sido dado de click
        if (isset($_SESSION['carrito'])) {
            //inicializo el contador por segunda vez que fue dado click el producto
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        //El contador es igual a 0 si no habia sido clickeado, entonces se crea el carrito
        if ($counter == 0) {
            $producto = new Producto();
            $producto->setId($producto_id);
            $product = $producto->getOne();

            //comprabar que es un objeto
            if (is_object($product)) {
                $_SESSION['carrito'][] = array(
                    'id_producto' => $product->id,
                    'precio' => $product->precio,
                    'unidades' => 1,
                    'producto' => $product
                );
            }
        }
        header("location:" . base_url . "producto/productos");
    }

    public function delete()
    {
        if (isset($_SESSION['carrito'])) {
            unset($_SESSION['carrito']);
        }
    }

    public function up()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                }
            }
        }
        header("location: "  . base_url . "carrito/index");
    }

    public function down()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    if ($_SESSION['carrito'][$indice]['unidades'] >= 1) {
                        $_SESSION['carrito'][$indice]['unidades']--;
                    }
                }
            }
        }
        header("location: "  . base_url . "carrito/index");
    }

    public function borrar()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    unset($_SESSION['carrito'][$indice]);
                }
            }
        }
        header("location: "  . base_url . "carrito/index");
    }
}
