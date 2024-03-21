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
            return false;
        }
    }
   

    public function eliminar_pedido($id){
        $consult=new pedidos_pendientes_model();
        $eliminar=$consult->eliminar_pedidos_orden($id);
        if($eliminar){
            return true;
        }else{
            return false;
        }
    }

}
$consult=new pedidos_pendientes();
$pedidos=$consult->datos_pedidos();


if (isset($_GET['idEliminar'])) {
    $idEliminar = $_GET['idEliminar'];
    $eliminar_pedido=$consult->eliminar_pedido($idEliminar);
if($eliminar_pedido){
    
    $mensaje = urlencode("Pedido eliminado correctamente!");
    $error = urlencode("Tu mensaje de error aquí");
    header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=$mensaje");

}else{
    $error = urlencode("No se pudo eliminar el pedido, intente nuevamente más tarde");
    header("Location: " . $_SERVER['PHP_SELF'] . "?error=$error");
}
    
}

$mensaje = isset($_GET['mensaje']) ? urldecode($_GET['mensaje']) : '';
$error = isset($_GET['error']) ? urldecode($_GET['error']) : '';

include('../../../view/admin/paginas/ventas/pedidos_pendientes.php');
?>