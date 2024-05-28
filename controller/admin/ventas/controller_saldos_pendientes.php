<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/ventas/saldos_pendientes_model.php');

// LOGICA
$consulta = new saldos_pendientes_model();
$abonos_pendientes = $consulta->traer_abonos_pendientes();
include('../../../view/admin/paginas/ventas/saldos_pendientes.php');
