<?php

require_once('../../../model/admin/ventas/regventa_model.php');

class RegVenta
{

    public function __construct()
    {
    }

    public function areas()
    {
        $consult = new RegVenta_consult();
        $nombresBd = $consult->nombre_area();
        return $nombresBd;
    }

    public function curso($categoria)
    {
        $consult = new RegVenta_consult();
        $subject_bd = $consult->nombre_subject($categoria);
        return $subject_bd;
    }

    public function precio_area($categoria)
    {
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
            $datosVenta = array();
            $datosVenta['cursos'] = $cursos;
            $datosVenta['precio'] = $precio;
            header('Content-Type: application/json');
            echo json_encode($datosVenta);
        }
        exit;  // Detener la ejecución para evitar imprimir HTML no deseado
    }
    if (isset($_POST['dni'])) {
        //HASTA ACÁ SIRVE Y RECIBE EL FORMULARIO.
        $nombres = $_POST['nombres'];
        $dni = $_POST['dni'];
        $correo = $_POST['correo'];
        $ciudad = $_POST['ciudad'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $descuento = $_POST['descuento'];
        $valor_total = $_POST['valor-total'];
        $detallesVentaJSON = $_POST['detallesVenta'];
        $detallesVenta = json_decode($detallesVentaJSON, true);
        
        // INSERTAR LA VENTA A LA BD
        $modelo = new RegVenta_consult();
        $resultado_modelo_id=$modelo->agregar_venta_completa($nombres,$apellidos,$dni,$correo,$ciudad,$telefono,$descuento,$valor_total);
        if($resultado_modelo_id){
            $resultado_detalles=$modelo->agregar_detalles_venta($detallesVenta,$resultado_modelo_id);
            if($resultado_detalles){
                echo "VENTA REGISTRADA Y DETALLES: ".$resultado_modelo_id;
                
            }else{
                echo "<h1>perdedores hptas</H1>";
            }

        }else{
            echo "<h1>perdedores hptas</H1>";
        }
        
        // Ahora puedes trabajar con $detallesVenta en PHP
        foreach ($detallesVenta as $detalle) {
            // Acceder a los campos del detalle
            $categoria = $detalle['categoria'];
            $curso = $detalle['curso'];
            $horas = $detalle['horas'];
            $valorHora = $detalle['valorHora'];
            $valorCurso = $detalle['valorCurso'];
            
            // Puedes hacer lo que necesites con esta información
            // Por ejemplo, almacenarla en la base de datos

        }
    }
}

// Manejar errores
if (isset($nombresAreas['error']) && $nombresAreas['error']) {
    $error_message = $nombresAreas['message'];
} else {
    $datosParaVista = $nombresAreas;
}


include('../../../view/admin/paginas/ventas/RegVenta.php');
