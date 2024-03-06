<?php 

require_once('../../../model/admin/ventas/regventa_model.php');

class RegVenta {
    
    public function __construct() {

    }

    public function areas() {
        $consult = new RegVenta_consult();
        $nombresBd = $consult->nombre_area();
        return $nombresBd;
    }

    public function curso($categoria) {
        $consult = new RegVenta_consult();
        $subject_bd = $consult->nombre_subject($categoria);
        return $subject_bd;
    }

    public function precio_area($categoria){
        $consult = new RegVenta_consult();
        $precio_bd = $consult->precio_area($categoria);
        return $precio_bd;
    }

}

$consult = new RegVenta();
$nombresAreas = $consult->areas();

$cursos = array(); // Declarar la variable antes del bloque if

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['categoria_seleccionada'])) {
        $categoria_seleccionada = $_POST['categoria_seleccionada'];
        $cursos = $consult->curso($categoria_seleccionada);
        $precio = $consult->precio_area($categoria_seleccionada);

        if ($cursos === false || $precio === false) {
            echo json_encode(['error' => 'Error al obtener datos.']);
        } else {
            $datosVenta=array();
            $datosVenta['cursos'] = $cursos;
            $datosVenta['precio'] = $precio;
            header('Content-Type: application/json');
            echo json_encode($datosVenta);
        }
        exit;  // Detener la ejecución para evitar imprimir HTML no deseado
    }if (isset($_POST['dni'])){
       //HASTA ACÁ SIRVE Y RECIBE EL FORMULARIO.
       $nombres=$_POST['nombres'];
       $dni=$_POST['dni'];
       $correo=$_POST['correo'];
       $ciudad=$_POST['ciudad'];
       $apellidos=$_POST['apellidos'];
       $telefono=$_POST['telefono'];
       $descuento=$_POST['descuento'];
       $valor_total=$_POST['valor-total'];
        
    }

}


// Manejar errores
if (isset($nombresAreas['error']) && $nombresAreas['error']) {
    $error_message = $nombresAreas['message'];
} else {
    $datosParaVista = $nombresAreas;
}


include('../../../view/admin/paginas/ventas/RegVenta.php');


