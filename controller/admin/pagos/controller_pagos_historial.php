<?php 
include('../../../model/admin/pagos/pagos_historial_model.php');
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

$consult=new pagos_historial_model();
$historial_pagos=$consult->traer_historial_pagos();

include('../../../view/admin/paginas/pagos/pagos_historial.php'); 
?>