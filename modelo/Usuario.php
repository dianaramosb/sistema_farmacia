<?php
include_once 'Conexion.php';
class Usuario{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    //Metodos
    function Loguearse($dni,$pass){
        $sql="SELECT * FROM usuario INNER JOIN tipo_us on us_tipo=id_tipo_us WHERE dni_us=:dni AND contrasena_us=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni,':pass'=>$pass));
        $this->objetos =$query->fetchall();
        return $this->objetos;
    }
}
?>