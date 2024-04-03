<?php 
include('../../model/estudiante/catalogo_estudiante_model.php');

$ver_curso = new ver_curso(); // Crear una instancia de la clase ver_curso
$datos_curso = $ver_curso->seleccionar_curso(); // Obtener los datos de los cursos

// Organizar los datos por áreas para facilitar su visualización en la vista
$datos_organizados = [];
foreach ($datos_curso as $curso) {
    $area = $curso['area_name'];
    $datos_organizados[$area][] = $curso;
}

$data = array('datos_organizados' => $datos_organizados); // Pasar los datos organizados a la vista

include('../../view/estudiante/catalogo_estudiante.php');
?>