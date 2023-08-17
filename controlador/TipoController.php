<?php
include '../modelo/Tipo.php';
$tipo=new Tipo();

//Crear Tipo
if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre_tipo'];
    $tipo->crear($nombre);
}
//Editar tipo
if($_POST['funcion']=='editar'){
    $nombre = $_POST['nombre_tipo'];
    $id_editado = $_POST['id_editado'];
    $tipo->editar($nombre,$id_editado);
}
//Buscar tipo
if($_POST['funcion']=='buscar'){
    $tipo->buscar();
    $json=array();
    foreach ($tipo->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_tip_prod,
            'nombre'=>$objeto->nombre,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
//Borrar tipo
if($_POST['funcion']=='borrar'){
    $id=$_POST['id'];
    $tipo->borrar($id);
}
//Rellenar tipo en el select
if($_POST['funcion']=='rellenar_tipos'){
    $tipo->rellenar_tipos();
    $json=array();
    foreach ($tipo->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_tip_prod,
            'nombre'=>$objeto->nombre
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
?>
