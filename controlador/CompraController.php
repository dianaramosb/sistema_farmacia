<?php
include '../modelo/Venta.php';
$venta = new Venta();
session_start();
$vendedor = $_SESSION['usuario'];
if($_POST['funcion']=='registrar_compra'){
    $total=$_POST['total'];
    $nombre=$_POST['nombre'];
    $dni=$_POST['dni'];
    $productos=json_decode($_POST['json']);
    date_default_timezone_set('Amercia/Managua');
    $fecha = date('y-m-d H:i:s');
    $venta->crear($nombre,$dni,$total,$fecha,$vendedor); 
}