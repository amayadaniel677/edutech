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

$ventasFiltradas = $consult->ventas();
// echo "ventas filtradas: ".$ventasFiltradas;
if(isset($ventasFiltradas)){
    // pintar la longitud de la consulta
    
    echo "cantidad ventas filtradas". count($ventasFiltradas);
    $ventas = $ventasFiltradas; 
    // Número de resultados por página
    $resultados_por_pagina = 10;
echo "resultados por pagina: ".$resultados_por_pagina;
    // Obtener la página actual
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    echo "pagina actual: ".$pagina;
    // Calcular el offset para la consulta SQL
    $offset = ($pagina - 1) * $resultados_por_pagina;
    echo "offset: ".$offset;

    // Calcular el número total de páginas
    $total_paginas = ceil(count($ventas) / $resultados_por_pagina);
echo "total paginas: ".$total_paginas;
    // Obtener solo los resultados para la página actual
    $ventas_paginadas = array_slice($ventas, $offset, $resultados_por_pagina);
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

    


    function ver_mensaje()
    {
        foreach ($this->mensaje_diagnostico as $elemento) {
            echo '<h1 class="text-danger">' . $elemento . '</h1>';
        }
    }
}


include('../../../view/admin/paginas/ventas/buscar_ventas.php');
