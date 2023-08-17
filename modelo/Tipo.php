<?php
include 'Conexion.php';
class Tipo{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    //Metodo Crear tipos
    function crear($nombre){
        $sql="SELECT id_tip_prod FROM tipo_producto WHERE nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql="INSERT INTO tipo_producto(nombre) VALUES (:nombre);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre));
            echo 'add';
        }
    }
    //Metodo para buscar tipo
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM tipo_producto where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM tipo_producto where nombre NOT LIKE '' ORDER BY id_tip_prod LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    //Metodo borrar tipo
    function borrar($id){
        $sql="DELETE FROM tipo_producto WHERE id_tip_prod=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        if(!empty($query->execute(array(':id'=>$id)))){
            echo 'borrado';
        }
        else{
            echo 'noborrado';
        }       
    }
    //Metodo editar tipo
    function editar($nombre,$id_editado){
        $sql="UPDATE tipo_producto SET nombre=:nombre WHERE id_tip_prod=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
        echo 'edit';
    }
    //Metodo rellenar tipo en el select
    function rellenar_tipos(){
        $sql="SELECT * FROM tipo_producto ORDER BY nombre asc";
        $query= $this->acceso->prepare($sql);
        $query->execute(); 
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }  
}
?>