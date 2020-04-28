<?php 
    Class Database {
        public static function conection(){
            $host="localhost";
            $username = "root";
            $pass="";
            $db="black_fire";

            $conexion= new mysqli($host,$username,$pass,$db);
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
        }
    }
?>