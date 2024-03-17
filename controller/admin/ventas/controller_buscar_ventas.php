<?php
include('../../../model/admin/ventas/buscar_ventas_model.php');
$consult= new controlador_buscar_venta();
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_post['dni'];

    $venta=$consult->venta($dni);
    $mensaje=$consult->ver_mensaje();
    header("Location: " . $_SERVER['PHP_SELF']);

}
    $ventas=$consult->ventas();

    if($venta){
        $bandera= true;
    }else{
        $bandera=false;
    }
    

class controlador_buscar_venta
{
    public $mensaje_diagnostico = [];
    public function __construct()
    {
    }

    public function ventas(){
        $consult= new buscar_venta_model();
        $ventas=$consult->ventas();
        if($ventas){
            return $ventas;
        }else{
            return false;
        }

    }

    public function venta($dni)
    {
                $consult= new buscar_venta_model();
                $usuario=$consult->user_exist($dni);
                if($usuario){
                    $venta=$consult->venta($dni);
                }else{
                    $this->mensaje_diagnostico[]='El documento no es valido';
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
