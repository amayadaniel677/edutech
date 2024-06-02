<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav

include("../../../model/admin/areas/desvincular_docente_model.php");
if (isset($_GET['id_people_area']) and isset($_GET['area_id'])) {
    $id_people_area = $_GET['id_people_area'];
    $area_id = $_GET['area_id'];
    $consult = new desvincular_docente_model();
    if ($consult->desvincular($id_people_area)) {
        $mensaje = 'El docente ha sido desvinculado';
        header("location: controller_buscar_area.php?mensaje=$mensaje&area_id=" . $area_id . "");
    } else {
        $mensaje = 'No se pudo desvincular el docente';
        header("location: controller_buscar_area.php?error=$mensaje&area_id=" . $area_id . "");
    }
}
