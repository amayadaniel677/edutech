<?php 
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/ventas/reporte_venta_model.php');
$consult=new reporte_venta_model();
$areas=$consult->traer_areas();


$id_area=$_POST['area'];

$datos[]=[$area];
echo json_encode($datos);

var_dump( $id_area);
include('../../../view/admin/paginas/ventas/reporte_venta.php');
?>