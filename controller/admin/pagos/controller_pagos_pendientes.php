<?php 
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/pagos/pagos_pendientes_model.php');

include('../../../view/admin/paginas/pagos/pagos_pendientes.php');
?>