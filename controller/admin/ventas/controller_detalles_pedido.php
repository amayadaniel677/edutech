<?php 
include('../../../model/admin/ventas/detalles_pedido_model.php');
class detalles_pedido_controller{
    public function datos_detalles_pedido($id){
        $consult=new detalles_pedido_model();
        $detalle=$consult->obtener_detalle_pedidos($id);
        if($detalle){
            return $detalle;
        }else{
            return "bobos hptas";
        }
    }
}

if (isset($_GET['idPedido'])) {
    $id_pedido = $_GET['idPedido'];
    $detalles_controller=new detalles_pedido_controller();
    $detalles=$detalles_controller->datos_detalles_pedido($id_pedido);
    var_dump($detalles);
}
if($_SERVER['REQUEST-METHOD'=='POST']){
    $idPedidoConfirmado=$_POST['idPedidoConfirmado'];
    $totalPedido=$_POST['total'];
}


include('../../../view/admin/paginas/ventas/detalles_pedido.php');


?>