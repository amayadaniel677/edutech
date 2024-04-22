<?php 
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/usuarios/buscar_usuario_model.php');
// verificar si enviaron $mensaje por get
if (isset($_GET['mensaje'])) {
    $mensaje_editar = $_GET['mensaje'];
}

include('../../../view/admin/paginas/usuarios/buscar_usuario.php');
?>
