
<?php
// Incluir el modelo y crear una instancia del modelo
include('../../model/docente/cursos_docente_model.php');
// Crear una instancia del modelo
// Iniciar sesión
session_start();
// Llamar a la función getAreasAndSubjectsFromSession después de iniciar sesión y asignar el ID de docente
$modelo = new areas_subjects_Consult();
$areas_materias = $modelo->getAreasAndSubjectsFromSession();

// Mostrar los resultados


// Array asociativo donde las claves son los IDs de las áreas y los valores son arrays de materias
$areas_materias_docente = array();
foreach ($areas_materias as $am) {
    $area_id = $am['area_id'];
    $materia_nombre = $am['materia_nombre'];
    if (!isset($areas_materias_docente[$area_id])) {
        $areas_materias_docente[$area_id] = array();
    }
    $areas_materias_docente[$area_id][] = $materia_nombre;
}
//var_dump($areas_materias);
// // Vista para mostrar la información
include('../../view/docente/cursos_docente.php');




?>


