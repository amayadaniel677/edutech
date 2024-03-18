<?php
include('../../../model/admin/ventas/buscar_ventas_model.php');
$consult= new controlador_buscar_venta();
$bandera=false;
if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['dni'])){
        $dni=$_POST['dni'];
        $ventas=$consult->venta($dni);      
        $mensaje=$consult->ver_mensaje();
        $bandera=true;
    }
}else{
    $ventas = $consult->ventas();
}

// Obtener los datos paginados


// Número de resultados por página
$resultados_por_pagina = 5;

// Obtener la página actual
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el offset para la consulta SQL
$offset = ($pagina - 1) * $resultados_por_pagina;

// Calcular el número total de páginas
$total_paginas = ceil(count($ventas) / $resultados_por_pagina);

// Obtener solo los resultados para la página actual
$ventas_paginadas = array_slice($ventas, $offset, $resultados_por_pagina);




    

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
                    return $venta;
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
?>