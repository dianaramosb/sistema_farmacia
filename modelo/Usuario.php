<?php
include_once 'Conexion.php';
class Usuario{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    //Metodos
    // Permite al usuario iniciar sesion
    function Loguearse($dni,$pass){
        $sql="SELECT * FROM usuario INNER JOIN tipo_us on us_tipo=id_tipo_us WHERE dni_us=:dni AND contrasena_us=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni,':pass'=>$pass));
        $this->objetos =$query->fetchall();
        return $this->objetos;
    }
    //Muestra los datos del usuario logueado
    function obtener_datos($id){
        $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us and id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos =$query->fetchall();
        return $this->objetos;
    }
    //Guardar los datos editados del usuario
    function editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional){
        $sql="UPDATE usuario SET telefono_us=:telefono, residencia_us=:residencia, correo_us=:correo, sexo_us=:sexo, adicional_us=:adicional WHERE id_usuario=:id";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':telefono'=>$telefono,':residencia'=>$residencia,':correo'=>$correo,':sexo'=>$sexo,':adicional'=>$adicional));    
    }
    //Metodo cambiar contra
    function cambiar_contra($id_usuario,$oldpass,$newpass){
        $sql="SELECT * FROM usuario WHERE id_usuario=:id AND contrasena_us=:oldpass";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':oldpass'=>$oldpass)); 
        $this->objetos = $query->fetchall(); 
        if(!empty($this->objetos)){
            $sql="UPDATE usuario SET contrasena_us=:newpass WHERE id_usuario=:id";
            $query= $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_usuario,':newpass'=>$newpass));
            echo 'update';
        }
        else{
            echo 'noupdate';
        }
    }
    //Metodo cambiar Imagen
    function cambiar_photo($id_usuario,$nombre){
        $sql="SELECT avatar FROM usuario WHERE id_usuario=:id";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario)); 
        $this->objetos = $query->fetchall();            
        $sql="UPDATE usuario SET avatar=:nombre WHERE id_usuario=:id";
        $query= $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':nombre'=>$nombre));
        return $this->objetos;              
    }
    //Metodo para buscar usuario
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM usuario join tipo_us on us_tipo=id_tipo_us where nombre_us LIKE :consulta";
            $query = $this->acceso->prepare($sql);
        }
        else{

        }
    }
}
?>