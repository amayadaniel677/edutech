<?php

include('../../model/estudiante/descripcion_curso_estudiante_model.php');

if (isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];
    // Crear una instancia del modelo para acceder a las funciones
    $curso_model = new descripcionCurso();

    // Llamar a la función descripcion_curso para obtener los detalles del curso
    $detalle_curso = $curso_model->descripcion_curso($id_curso);

    if ($detalle_curso) {
        $area = $detalle_curso['area_name']; // Obtener el nombre del área del curso

        // Llamar a la función mostrarDocentesPorArea para obtener los docentes del área específica
        $docentes_area = $curso_model->mostrarDocentesPorArea($area);

        // Pasar los detalles del curso y los docentes a la vista
        $curso1 = $detalle_curso;
        
        $docentes = $docentes_area; // Asignar los docentes del área al arreglo de docentes

        // Incluir la vista y pasar los detalles del curso y los docentes como datos
        
    } else {
        echo "No se encontraron detalles para este curso.";
    }
} else {
    echo "No se proporcionó un ID de curso válido.";
}


include('../../view/estudiante/descripcion_curso_estudiante.php');
