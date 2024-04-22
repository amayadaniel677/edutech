<?php 

session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../../../model/admin/areas/buscar_area_model.php');
$consult=new buscar_area_model();
if($consult->traer_areas()){
    $areas=$consult->traer_areas();
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['categoria']) && $_POST['categoria'] != '') {
    $id_area=$_POST['categoria'];
    // traer area seleccionada
    $areaSelect=$consult->traer_area($id_area);
    
    // traer docentes vinculados
    $vinculados=$consult->traer_vinculados($id_area);
}
if(isset($_GET['mensaje'])){
    $mensaje=$_GET['mensaje'];
}
if ($_POST and isset($_POST['nombre'] ) and isset($_POST['precio']) and isset($_POST['idArea']) and $_POST['nombre'] != '' and $_POST['precio'] != '' and $_POST['idArea']){
    // Debugging (borrar después de verificar que los datos son correctos
    $nombre = $_POST['nombre'];
    $nombre= trim($nombre);
    $nombre = ucfirst($nombre); // Convierte la primera letra en mayúscula
    $precio = $_POST['precio'];
    $id = $_POST['idArea'];
    $status = $_POST['status'];
    
    $areaModel = new buscar_area_model();
    $areaModel->editarArea($nombre, $precio, $id,$status);
    if($areaModel){
        $mensaje = 'Area actualizada correctamente';
    }else{
        $error = 'Error al actualizar el area';
    }
}


include('../../../view/admin/paginas/areas/buscar_area.php');
?>