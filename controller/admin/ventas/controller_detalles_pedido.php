<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/ventas/detalles_pedido_model.php');
class detalles_pedido_controller
{
    public function datos_detalles_pedido($id)
    {
        $consult = new detalles_pedido_model();
        $detalle = $consult->obtener_detalle_pedidos($id);
        if ($detalle) {
            return $detalle;
        } else {
            return "bobos hptas";
        }
    }
    public function registrar_venta($precio, $people_id)
    {
        $registrar_venta_model = new detalles_pedido_model();
        $resultado_registrar_venta = $registrar_venta_model->registrar_venta_completa($precio, $people_id);
        if ($resultado_registrar_venta) {
            return $resultado_registrar_venta;
        } else {
            return false;
        }
    }
    public function registrar_detalles_venta($detalles, $sales_id)
    {
        // desempaquetamos $detalle

        $registrar_detalles_model = new detalles_pedido_model();
        $count = 0;
        foreach ($detalles as $indice => $detalle) {
            $price = $detalle['price'];
            $hours = $detalle['hours'];
            $subjects_id = $detalle['subjects_id'];
            $sales_id = $sales_id;
            $rta_modelo = $registrar_detalles_model->registrar_detalles_venta($price, $hours, $subjects_id, $sales_id);
            if ($rta_modelo) {
                $count += 1;
            }
        }
        return $count;
    }
    public function eliminar_pedido($idPedido)
    {
        $eliminar_pedido = new detalles_pedido_model();
        $rta_eliminar_model = $eliminar_pedido->eliminar_pedido($idPedido);
        if ($rta_eliminar_model) {
            return true;
        }
    }
}

if (isset($_GET['idPedido'])) {
    $id_pedido = $_GET['idPedido'];
    $detalles_controller = new detalles_pedido_controller();
    $detalles = $detalles_controller->datos_detalles_pedido($id_pedido);
    // var_dump($detalles);

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $detallesJson = $_POST['detallesJson'];
    $totalPedido = $_POST['total'];
    $detalles = json_decode($detallesJson, true); // El segundo parámetro 'true' convierte el JSON en un arreglo asociativo
    // Ahora puedes trabajar con el arreglo $detalles
    var_dump($detalles);
    $controller = new detalles_pedido_controller();
    // REGISTRAR VENTA y CAPTURAR EL ID DE ESA VENTA
    $people_id = $detalles[0]['people_id'];
    $id_venta_nueva = $controller->registrar_venta($totalPedido, $people_id);
    if ($id_venta_nueva) {
        $rta_controller = $controller->registrar_detalles_venta($detalles, $id_venta_nueva);
        if ($rta_controller > 0) {
            $eliminar_pedido_controller = $controller->eliminar_pedido($id_pedido);
            if ($eliminar_pedido_controller) {
                $mensaje = 'NUEVA VENTA REGISTRADA. ' . $rta_controller . " CURSOS ";
                $error='PEDIDO ELIMINADO';
            } else {
                $mensaje = 'NUEVA VENTA REGISTRADA.' . $rta_controller . " CURSOS  ";
                $error = 'Se recomienda eliminar manualmente el pedido confirmado';
            }
        } else {
            $mensaje = 'SE REGISTRÓ LA VENTA CORRECTAMENTE';
            $error = 'No se pudo registrar los detalles, elimine esta venta generada y vuelva a confirmar el pedido';
        }
        if(isset($mensaje)){
            $mensajeCodificado = urlencode($mensaje);
        }
        if(isset($error)){
            $errorCodificado = urlencode($error);
        }
       

        header("Location: controller_pedidos_pendientes.php?mensaje=$mensajeCodificado&error=$errorCodificado");
    } else {
        $error = 'No se pudo registrar el pedido como venta, vuelva a intentarlo';
    }
    // enviar detalles a la clase de controller 

}


include('../../../view/admin/paginas/ventas/detalles_pedido.php');
