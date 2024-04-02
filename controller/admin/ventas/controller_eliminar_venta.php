<?php
include('../../../model/admin/ventas/eliminar_venta_model.php');
if (isset($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_venta_post=$_POST['id_venta'];
    $consult = new eliminar_venta();
    $eliminar=$consult->eliminar($id_venta_post);
    if($eliminar){
        $msj_eliminar='La venta a sido eliminada con exito';
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
include('../../../view/admin/paginas/ventas/eliminar_venta.php');
?>