<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/pagos/pagos_pendientes_model.php');

$consult = new pagos_pendientes_model();
$pagos = $consult->traer_pagos();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pago_id = $_POST['pago_id'];
    $cantidad = $_POST['cantidad'];
    $valor_horas = $_POST['valor_horas'];
    $valor_total = $_POST['valor_total'];
    $horas_bd = $consult->pagos_exist($pago_id);
    $horas_bd = $horas_bd['total_hours'];

    if ($cantidad <= $horas_bd) {
        $pago = $consult->hacer_pago($cantidad, $valor_horas, $valor_total, $pago_id);
        if ($pago) {
            $mensaje_ok = 'El pago se realizo correctamente';
            header('refresh:4;url=controller_pagos_pendientes.php');
        } else {
            $error = 'Error, el pago no pudo realizarse';
        }


    } else {
        $error = "La cantidad de horas ingresadas ($cantidad) excede las que tiene el docente ($horas_bd)";

    }
}

include('../../../view/admin/paginas/pagos/pagos_pendientes.php');
?>