<?php 

    Class Utils{

        public static function unSession(){
            unset($_SESSION['register']);
            unset($_SESSION['failed']);
        }

        public static function unSessions($session){
            unset($_SESSION[$session]);
        }

        public static function isAdmin(){
            if (!isset($_SESSION['admin'])) {
                Header("location: ".base_url);
            }
        }

        public static function statsCarrito(){
            $stats = array(
                'count' => 0,
                'total' => 0
            ); 
    
            if (isset($_SESSION['carrito'])) {
                $stats['count'] = count($_SESSION['carrito']);
                foreach($_SESSION['carrito'] as $producto){
                    $stats['total'] += $producto['precio']*$producto['unidades'];
                }
            }
            return $stats;
        }

        public static function carritoClick($id)
        {   
            $result = false;
            if (isset($_SESSION['carrito'])) {
                foreach($_SESSION['carrito'] as $producto){
                    if ($producto['id_producto'] == $id) {
                        $result = true;
                    }
                }
            }
            return $result;
        }
    }


?>