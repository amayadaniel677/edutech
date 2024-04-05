<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../../model/admin/areas/buscar_area_model.php');
$consult=new buscar_area_model();
if($consult->traer_areas()){
    $areas=$consult->traer_areas();
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['categoria']){
    $id_area=$_POST['categoria'];
    $vinculados=$consult->traer_vinculados($id_area);
}
if(isset($_GET['mensaje'])){
    $mensaje=$_GET['mensaje'];
}
if ($_POST and $_POST['nombre'] != '' and $_POST['precio'] != '' and $_POST['idArea'] != '') {
    $nombre = $_POST['nombre'];
    $nombre= trim($nombre);
    $nombre = ucfirst($nombre); // Convierte la primera letra en mayúscula
    $precio = $_POST['precio'];
    $id = $_POST['idArea'];
    $areaModel = new buscar_area_model();
    $areaModel->editarArea($nombre, $precio, $id);
    if($areaModel){
        $mensaje = 'Area actualizada correctamente';
    }else{
        $error = 'Error al actualizar el area';
    }
}

include('../../../view/admin/paginas/areas/buscar_area.php');
?>