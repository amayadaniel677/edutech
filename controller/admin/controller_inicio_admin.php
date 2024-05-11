
<?php
//PONERLE ESTO A TODOS LOS CONTROLADORES

session_start();

if (!isset( $_SESSION['dni_session'])){
    header('location:../login_controller.php');
    exit();
}

$ruta_inicio='../../';  //esta ruta se usa para cerrar sesion en el nav

//PONERLE ESTO A TODOS LOS CONTROLADORES

include('../../view/admin/inicio_admin.php');

?>
