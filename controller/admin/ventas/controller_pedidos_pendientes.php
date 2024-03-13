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
        $eliminar=$consult->eliminar_pedidos_orden($id);
        if($eliminar){
            return 'Eliminada con exito';
        }else{
            return 'No pudo ser eliminada';
        }
    }

}
$consult=new pedidos_pendientes();
$pedidos=$consult->datos_pedidos();


if (isset($_POST['pedidoId'])) {
    $idPedido = $_POST['pedidoId'];

    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        
        if ($accion === 'ver') {
            $detalle=$consult->datos_detalle_pedidos($idPedido);
        } elseif ($accion === 'eliminar') {
            $consult->eliminar_pedido($idPedido);
        } 
    }
}




include('../../../view/admin/paginas/ventas/pedidos_pendientes.php');
?>