<?php
include 'Conexion.php';
class Presentacion{
    var $objetos;
    public function __construct(){
        $db= new Conexion();
        $this->acceso=$db->pdo;
    }
    //Metodo Crear presentaciones
    function crear($nombre){
        $sql="SELECT id_presentacion FROM presentacion WHERE nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql="INSERT INTO presentacion(nombre) VALUES (:nombre);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre));
            echo 'add';
        }
    }
    //Metodo para buscar presentacion
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM presentacion where nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM presentacion where nombre NOT LIKE '' ORDER BY id_presentacion LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    //Metodo borrar presentacion
    function borrar($id){
        $sql="DELETE FROM presentacion WHERE id_presentacion=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        if(!empty($query->execute(array(':id'=>$id)))){
            echo 'borrado';
        }
        else{
            echo 'noborrado';
        }       
    }
    //Metodo editar presentacion
    function editar($nombre,$id_editado){
        $sql="UPDATE presentacion SET nombre=:nombre WHERE id_presentacion=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
        echo 'edit';
    }  
     //Metodo rellenar presentacion en el select
     function rellenar_presentaciones(){
        $sql="SELECT * FROM presentacion ORDER BY nombre asc";
        $query= $this->acceso->prepare($sql);
        $query->execute(); 
        $this->objetos = $query->fetchall();
        return $this->objetos;
    }
}
?>