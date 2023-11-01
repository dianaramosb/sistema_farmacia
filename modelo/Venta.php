<?php
include 'Conexion.php';
class Venta{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    //Crear una nueva venta
    function crear($nombre,$dni,$total,$fecha,$vendedor){

    }
}