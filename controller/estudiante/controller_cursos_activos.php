<?php 
session_start();
include('../../model/estudiante/cursos_activos_model.php');
$curso_activo = new cursosActivos();
$orden_cursos_activos = $curso_activo->Mostrar_curso();

// En tu controlador
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_curso = $_POST["nombre_curso"];
    $horas_adicionales = $_POST["horas"];
    
    // Llamar a la función para agregar horas en tu modelo
    $exito = $curso_activo->Agregar_horas($horas_adicionales, $nombre_curso);
    
    // Crear un array para la respuesta JSON
    $response = array();
    
    // Manejar el resultado de la inserción
    if ($exito) {
        $response['success'] = true;
        $response['message'] = "Se agregaron $horas_adicionales horas al curso $nombre_curso.";
    } else {
        $response['success'] = false;
        $response['message'] = "No se pudo agregar horas al curso. Inténtalo de nuevo.";
    }
    $response = array(
        'success' => true,
        'hours' => $totalHorasActualizadas, // Este sería el nuevo número de horas después de la actualización
        'success_message' => "Se actualizaron las horas correctamente."
    );
    echo json_encode($response);
    
    // Devolver la respuesta JSON al cliente
  
   
    exit; // ¡Es importante salir del script después de enviar la respuesta JSON!
}



include('../../view/estudiante/cursos_estudiante.php');
?>
