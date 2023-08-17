<?php
include 'Conexion.php';
class Producto{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    //Metodo Crear nuevos productos
    function crear($nombre,$concentracion,$adicional,$precio,$laboratorio,$tipo,$presentacion,$avatar){
        $sql="SELECT id_producto FROM producto WHERE nombre=:nombre and concentracion=:concentracion and adicional=:adicional and prod_lab=:laboratorio and prod_tip=:tipo and prod_present=:presentacion";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre,':concentracion'=>$concentracion,':adicional'=>$adicional,':laboratorio'=>$laboratorio,':tipo'=>$tipo,':presentacion'=>$presentacion));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql="INSERT INTO producto(nombre,concentracion,adicional,precio,prod_lab,prod_tip,prod_present,avatar) VALUES (:nombre,:concentracion,:adicional,:precio,:laboratorio,:tipo,:presentacion,:avatar);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':concentracion'=>$concentracion,':adicional'=>$adicional,':laboratorio'=>$laboratorio,':tipo'=>$tipo,':presentacion'=>$presentacion,':precio'=>$precio,':avatar'=>$avatar));
            echo 'add';
        }
    }
    //Metodo para buscar productos
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT id_producto, producto.nombre as nombre,concentracion,adicional,precio, laboratorio.nombre as laboratorio, tipo_producto.nombre as tipo, presentacion.nombre as presentacion, producto.avatar as avatar
            FROM producto 
            join laboratorio on prod_lab=id_laboratorio
            join tipo_producto on prod_tip_prod=id_tip_prod
            join presentacion on prod_present=id_presentacion and producto.nombre like :consulta LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT id_producto, producto.nombre as nombre,concentracion,adicional,precio, laboratorio.nombre as laboratorio, tipo_producto.nombre as tipo, presentacion.nombre as presentacion, producto.avatar as avatar
            FROM producto 
            join laboratorio on prod_lab=id_laboratorio
            join tipo_producto on prod_tip_prod=id_tip_prod
            join presentacion on prod_present=id_presentacion and producto.nombre not like '' LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
}
?>