<?php 
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../login_controller.php');
    exit();
}
$ruta_inicio='../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../view/docente/perfil_docente.php');
?>