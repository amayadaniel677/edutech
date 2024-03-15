<?php 
include('../../../model/admin/ventas/pedidos_pendientes_model.php');

class pedidos_pendientes{

    public function __construct() {
        
    }

    public function datos_pedidos(){
        $consult=new pedidos_pendientes_model();
        $pedidos=$consult->obtener_pedidos();
        if($pedidos){
            return $pedidos;
        }else{
            return 'no existen datos';
        }
    }
    public function datos_detalle_pedidos($id){
        $consult=new pedidos_pendientes_model();
        $detalle=$consult->obtener_detalle_pedidos($id);
        if($detalle){
            return $detalle;
        }else{
            return false;
        }
    }

    public function eliminar_pedido($id){
        $consult=new pedidos_pendientes_model();
        $eliminar=$consult->eliminar_pedidos_detalle($id);
        if($eliminar){
            return 'Eliminada con exito';
        }else{
            return 'No pudo ser eliminada';
        }
    }

}
$consult=new pedidos_pendientes();
$pedidos=$consult->datos_pedidos();


if (isset($_GET['idEliminar'])) {
    $idEliminar = $_GET['idEliminar'];
    $consult->eliminar_pedido($idEliminar);
    header("Location: ".$_SERVER['PHP_SELF']);
} 

include('../../../view/admin/paginas/ventas/pedidos_pendientes.php');
?>