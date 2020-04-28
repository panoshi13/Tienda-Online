<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contraseña;
    private $rol;
    private $db;

    public function __construct()
    {
        $this->db = Database::conection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }
    public function getContraseña()
    {
        return password_hash($this->db->real_escape_string($this->contraseña), PASSWORD_BCRYPT, ["cost" => 4]);
    }
    public function getRol()
    {
        return $this->rol;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    public function setCorreo($correo)
    {
        $this->correo = $this->db->real_escape_string($correo);
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $this->db->real_escape_string($contraseña);
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function save()
    {
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellido()}','{$this->getCorreo()}','{$this->getContraseña()}','usuario')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function getOne()
    {
        $correo = $this->correo;
        $contraseña = $this->contraseña;
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";

        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            $verify = password_verify($contraseña, $usuario->contraseña);
            if ($verify) {
                $result = $usuario;
            }
        }
        return  $result;
    }
}
