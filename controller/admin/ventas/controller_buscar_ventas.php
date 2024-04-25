<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/ventas/buscar_ventas_model.php');
$consult = new controlador_buscar_venta();
if (isset($_GET['msj_eliminar'])) {
    $msj_eliminar = $_GET['msj_eliminar'];
}

$ventas_paginadas = $consult->ventas();
// echo "ventas filtradas: ".$ventasFiltradas;







class controlador_buscar_venta
{
    public $mensaje_diagnostico = [];
    public function __construct()
    {
    }

    public function ventas()
    {
        $consult = new buscar_venta_model();
        $ventas = $consult->ventas();
        if ($ventas) {
            return $ventas;
        } else {
            return false;
        }
    }

    


    function ver_mensaje()
    {
        foreach ($this->mensaje_diagnostico as $elemento) {
            echo '<h1 class="text-danger">' . $elemento . '</h1>';
        }
    }
}


include('../../../view/admin/paginas/ventas/buscar_ventas.php');
