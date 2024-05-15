<?php 


session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/estudiante/descripcion_curso_estudiante_model.php');

if (isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];
    // Crear una instancia del modelo para acceder a las funciones
    $curso_model = new descripcionCurso();
   
    // Llamar a la función descripcion_curso para obtener los detalles del curso
    $detalle_curso = $curso_model->descripcion_curso($id_curso); 
    $mostrar_precio= $curso_model->mostrar_precio();

    $curso=$curso_model->traer_cursos($id_curso);
   
    if ($detalle_curso) {
        $area = $detalle_curso['area_name'];
        $area_id = $detalle_curso['id']; // Obtener el nombre del área del curso
        $cursos_area = $curso_model->seleccionar_curso($area_id);

      
        // Llamar a la función mostrarDocentesPorArea para obtener los docentes del área específica
        $docentes_area = $curso_model->mostrarDocentesPorArea($area);

        // Pasar los detalles del curso y los docentes a la vista
        $curso1 = $detalle_curso;
        
        $docentes = $docentes_area; // Asignar los docentes del área al arreglo de docentes

        // Incluir la vista y pasar los detalles del curso y los docentes como datos
        
    } else {
        echo "No se encontraron detalles para este curso.";
    }
} 
if (isset($_GET['id_eliminar'])){
    $id_eliminar=$_GET['id_eliminar'];
    $consult=new descripcionCurso();
    $curso_eliminado=$consult->eliminar_curso($id_eliminar);
    if($curso_eliminado){
        $mensaje_ok="El curso fue eliminado con exito";
        header("Refresh: 3; URL=controller_catalogo_cursos.php");
    }else{
        $mensaje="El curso no puso ser eliminado, intenntelo de nuevo más tarde...";
        header("Refresh: 3; URL=controller_catalogo_cursos.php");
    }
} 


include('../../../view/admin/paginas/cursos/descripcion_curso.php');
?>