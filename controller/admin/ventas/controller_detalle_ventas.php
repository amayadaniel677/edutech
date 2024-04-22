<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/ventas/detalle_ventas_model.php');
if (isset($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];
    $consult= new detalle_ventas_controller();
    $usuario=$consult->buscar_usuario($id_venta);
    $detalles_venta=$consult->detalles_venta($id_venta);
    
}

class detalle_ventas_controller{
    public function __construct()
    {
        
    }

    public function buscar_usuario($id_venta){
        $consult=new detalle_ventas_model();
        $usuario=$consult->buscar_usuario($id_venta);
        if($usuario){
            return $usuario;
        }else{
            return false;
        }
    }

    public function detalles_venta($id_venta){
        $consult=new detalle_ventas_model();
        $detalles_venta=$consult->detalle_ventas($id_venta);
        if($detalles_venta){
            return $detalles_venta;
        }else{
            return false;
        }

    }
}
include('../../../view/admin/paginas/ventas/detalle_ventas.php');
?>