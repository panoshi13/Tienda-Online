<?php

class Producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $stock;
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

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getStock()
    {
        return $this->stock;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    //SETTERS
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setImagen($imagen)
    {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }


    public function guardar()
    {
        $sql = "INSERT INTO productos VALUES(NULL,'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},'{$this->getImagen()}',{$this->getSTock()})";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = $save->fetch_assoc();
        }

        return $result;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos";
        $save = $this->db->query($sql);
        return $save;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id={$this->getId()}";
        $save = $this->db->query($sql);
        return $save;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM productos WHERE id={$this->getId()}";
        $save = $this->db->query($sql);
        return $save->fetch_object();
    }

    public function edit(){
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion = '{$this->getDescripcion()}' , precio={$this->getPrecio()} , stock= {$this->getStock()} ";

        if ($this->getImagen() !== null) {
            $sql.= ", imagen = '{$this->getImagen()}'";
        }

        $sql.= " WHERE id= {$this->id}";
        $save = $this->db->query($sql);
        return $save;
    }
}
