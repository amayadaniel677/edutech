<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit(); 
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/ventas/eliminar_venta_model.php');
if (isset($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];
    $consult = new eliminar_venta();
    $eliminar=$consult->eliminar($id_venta);
    if($eliminar){
        $msj_eliminar='La venta ha sido eliminada con exito';
        header("Location: controller_buscar_ventas.php?msj_eliminar=" . urlencode($msj_eliminar));

    }else{
        $msj_eliminar='La venta no pudo ser eliminada intentelo nuevamente';
        header("Location: controller_buscar_ventas.php?msj_eliminar=" . urlencode($msj_eliminar));

    } 

    
}

class eliminar_venta{
    public function __construct()
    {
        
    }

    public function eliminar($id_venta){
        $consult=new eliminar_venta_model();
        $eliminar=$consult->eliminar_venta($id_venta);
        if($eliminar){
            return true;
        }else{
            return false;
        }
    }
}
// include('../../../view/admin/paginas/ventas/eliminar_venta.php');
?>