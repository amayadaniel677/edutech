<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/ventas/saldos_pendientes_model.php');

if (isset($_GET['id_saldo'])) {
    $id_saldo = $_GET['id_saldo'];
    $modelo = new saldos_pendientes_model();
    $usuario = $modelo->obtenerDatosCliente($id_saldo);

    $detalles_abonos = $modelo->obtenerAbonos($id_saldo);
}
include('../../../view/admin/paginas/ventas/detalle_abonos.php');
