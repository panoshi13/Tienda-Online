<?php 

class Pedido{
    private $id;
    private $id_usuario;
    private $id_producto;
    private $direccion;
    private $distrito;
    private $departamento;
    private $fecha;
    private $cantidad;
    private $db;

    public function __construct()
    {
        $this->db = Database::conection();
    }

    function getId(){
        return $this->id;
    }
    function getId_usuario(){
        return $this->id_usuario;
    }
    function getId_producto(){
        return $this->id_producto;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function getDistrito(){
        return $this->distrito;
    }
    function getDepartamento(){
        return $this->departamento;
    }
    function getFecha(){
        return $this->fecha;
    }
    function getCantidad(){
        return $this->cantidad;
    }

    function setId($id){
        $this->id=$id;
    }
    function setId_usuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    function setId_producto($producto){
        $this->producto=$producto;
    }
    function setDireccion($direccion){
        $this->direccion=$this->db->real_escape_string($direccion);
    }
    function setDistrito($distrito){
        $this->distrito=$this->db->real_escape_string($distrito);
    }
    function setDepartamento($departamento){
        $this->departamento=$this->db->real_escape_string($departamento);
    }
    function setFecha($fecha){
        $this->fecha=$fecha;
    }
    function setCantidad($cantidad){
        $this->cantidad=$cantidad;
    }

    function insert(){
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getId_usuario()}, {$this->getId_producto()} , '{$this->getDireccion()}' ,'{$this->getDistrito()}' ,'{$this->getDepartamento()}' , CURDATE() , {$this->getCantidad()})";
        $insert = $this->db->query($sql);
        $result = false;
        if($insert){
            $result = true;
        }
        return $result;
    }
}