<?php
include '../modelo/Producto.php';
$producto=new Producto();

//Crear nuevo laboratorio
if($_POST['funcion']=='crear'){
    $nombre = $_POST['nombre'];
    $concentracion = $_POST['concentracion'];
    $adicional = $_POST['adicional'];
    $precio = $_POST['precio'];
    $laboratorio = $_POST['laboratorio'];
    $tipo = $_POST['tipo'];
    $presentacion = $_POST['presentacion'];
    $avatar ='prod-default.jpg';
    $producto->crear($nombre,$concentracion,$adicional,$precio,$laboratorio,$tipo,$presentacion,$avatar);
}
//Buscar producto
if($_POST['funcion']=='buscar'){
    $producto->buscar();
    $json=array();
    foreach ($producto->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_producto,
            'nombre'=>$objeto->nombre,
            'concentracion'=>$objeto->concentracion,
            'adicional'=>$objeto->adicional,
            'precio'=>$objeto->precio,
            'stock'=>'stock',
            'laboratorio'=>$objeto->laboratorio,
            'tipo'=>$objeto->tipo,
            'presentacion'=>$objeto->presentacion,
            'avatar'=>'../img/prod/'.$objeto->avatar,
        );    
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
?>
