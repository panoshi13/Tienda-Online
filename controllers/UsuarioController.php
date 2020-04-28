<?php
require_once 'models/usuario.php';

class usuarioController
{
    public function index()
    {
        echo "este es el index";
    }

    public function registrar()
    {
        require_once "views/usuario/registrar.php";
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ?  $_POST['nombre'] : false;
            $apellido = isset($_POST['apellido']) ?  $_POST['apellido'] : false;
            $correo = isset($_POST['correo']) ?  $_POST['correo'] : false;
            $contraseña = isset($_POST['contraseña']) ?  $_POST['contraseña'] : false;

            $errores = array();

            if ($nombre && $apellido && $correo && $contraseña) {

                if (!preg_match('/[0-9]/', $nombre) && !is_null($nombre)) {
                    $nombre_validado = true;
                } else {
                    $nombre_validado = false;
                    $errores['nombre'] = "El nombre tiene que ser letras";
                }

                if (!preg_match('/[0-9]/', $apellido) && !is_null($apellido)) {
                    $apellido_validado = true;
                } else {
                    $apellido_validado = false;
                    $errores['apellido'] = "El apellido tiene que ser letras";
                }

                if (filter_var($correo, FILTER_VALIDATE_EMAIL) && !is_null($correo)) {
                    $email_validado = true;
                } else {
                    $email_validado = false;
                    $errores['email'] = "El email no es correcto";
                }

                if (strlen($contraseña) > 5 && !is_null($contraseña)) {
                    $contraseña_validado = true;
                } else {
                    $contraseña_validado = false;
                    $errores['contraseña'] = "La contraseña es muy debil";
                }

                if (count($errores) == 0) {
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellido($apellido);
                    $usuario->setCorreo($correo);
                    $usuario->setContraseña($contraseña);

                    $save = $usuario->save();

                    if ($save) {
                        echo $_SESSION['register'] = "Usuario Registrado con Exito";
                    } else {
                        echo $_SESSION['failed'] = "Usuario NO Registrado";
                    }
                } else {
                    echo $_SESSION['failed'] = $errores;
                }
            } else {
                echo $_SESSION['failed'] = "Usuario NO Registrado";
            }
        }

        header("location: " . base_url . "usuario/registrar");
    }

    public function login()
    {
        require_once "views/usuario/login.php";
    }

    public function indentify()
    {
        if (isset($_POST)) {

            $usuario = new Usuario();
            $usuario->setCorreo($_POST['correo']);
            $usuario->setContraseña($_POST['contraseña']);

            //ejecutar el metodo del modelo
            $identify = $usuario->getOne();

            if ($identify && is_object($identify)) {
                $_SESSION['verify'] = $identify;

                if ($identify->rol == 'admin') {
                    $_SESSION['admin'] = true;
                    
                }
                Header("location: " .base_url);
            } else {
                $_SESSION['error-login'] = "Error al iniciar sesion";
                Header("location: " .base_url. "usuario/login");
            }
        }else{
            Header("location: " .base_url. "usuario/login");
        }
    }

    public function logout(){
        if (isset($_SESSION['verify']) && isset($_SESSION['admin'])) {
            Utils::unSessions('verify');
            Utils::unSessions('admin');
        }elseif(isset($_SESSION['verify'])){
            Utils::unSessions('verify');
        }
        header("location: " .base_url);
    }
}

