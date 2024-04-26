<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav


if (isset($_GET['msj_eliminar'])) {
    $msj_eliminar = $_GET['msj_eliminar'];
}

include('../../../model/admin/ventas/buscar_ventas_model.php');
$consult = new controlador_buscar_venta();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['dni'])) {

        $dni = $_POST['dni'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
       
       
        if (($from_date == '' and $to_date != '') || ($from_date != '' and $to_date == '')) {
           
            $mensaje = "Debe ingresar ambas fechas";
        } else {
            
            $ventasFiltradas = $consult->ventas_filtradas($dni, $from_date, $to_date);
           
            $mensaje = $consult->ver_mensaje();
        }
    }
}





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

    public function ventas_filtradas($dni, $from_date, $to_date)
    {
        $dni = trim($dni);
        $consult = new buscar_venta_model();
        $usuario = $consult->user_exist($dni);
        if ($usuario || $dni == '') {
            $venta = $consult->ventas_filtradas($dni, $from_date, $to_date);
            return $venta;
        } else {
            $this->mensaje_diagnostico[] = 'No hay usuarios con ese documento ingresado.';
        }
    }


    function ver_mensaje()
    {
        foreach ($this->mensaje_diagnostico as $elemento) {
            echo '<h1 class="text-danger">' . $elemento . '</h1>';
        }
    }
}


include('../../../view/admin/paginas/ventas/ventas_filtradas.php');
