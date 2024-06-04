<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/estudiante/catalogo_estudiante_model.php');

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
}
if (isset($_GET['mensaje_warning'])) {
    $mensaje_warning = $_GET['mensaje_warning'];
}

$ver_curso = new ver_curso(); // Crear una instancia de la clase ver_curso
$datos_curso = $ver_curso->seleccionar_curso(); // Obtener los datos de los cursos
$cursos_inactivos = $ver_curso->seleccionar_curso_inactivo(); //obtener los cursos inactivos

// Organizar los datos por áreas para facilitar su visualización en la vista
$datos_organizados = [];
if(is_array($datos_curso)){
    foreach ($datos_curso as $curso1) {
        $area = $curso1['area_name'];
        $datos_organizados[$area][] = $curso1;
    }
}


$data = array('datos_organizados' => $datos_organizados); // Pasar los datos organizados a la vista
include('../../../view/admin/paginas/cursos/catalogo_cursos_admin.php');
