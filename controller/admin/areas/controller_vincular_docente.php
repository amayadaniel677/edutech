<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/areas/vincular_docente_model.php');


$consult = new vincular_docente_model();
$areas = $consult->traer_areas();
$docentes = $consult->traer_docentes();
// ...



// ...

// Verificar si han enviado un docente para desvincular
if (isset($_GET['idDesvincular']) && isset($_GET['area_id'])) {
    $id_desvincular = $_GET['idDesvincular'];
    $area_id = $_GET['area_id'];
    if ($consult->inactivar_docente($id_desvincular)) {
        $mensaje = 'docente desvinculado con exito';
    }
    $docentes_vinculados = $consult->traer_docentes_vinculados($area_id);
    // Almacenar los datos en la sesión
    $_SESSION['docentes_vinculados'] = $docentes_vinculados;
}
// Recibir si han enviado un docente para vincular
if (isset($_GET['mensaje'])) {
    $mensaje = urldecode($_GET['mensaje']);
   
}
if ($_POST) {
    $id_area = $_POST['area'];
    $id_docente = $_POST['docente'];
    if ($id_area == 'false' || $id_docente == 'false') {
        $mensaje = "Seleccione un docente y un area";
    } else {
        $vincular = $consult->vincular_docente($id_area, $id_docente);
        if ($vincular) {
            $mensaje = "Docente vinculado con exito";
            $docentes_vinculados = $consult->traer_docentes_vinculados($id_area);
            // Almacenar los datos en la sesión
            $_SESSION['docentes_vinculados'] = $docentes_vinculados;
            // Redirigir al usuario a la misma página con un mensaje de éxito
            header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=" . urlencode($mensaje));
            exit();
        } else {
            $mensaje = "el docente ya esta vinculado a esta area";
            // Redirigir al usuario a la misma página con un mensaje de error
            header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=" . urlencode($mensaje));
            exit();
        }
    }
}




include('../../../view/admin/paginas/areas/vincular_docente.php');
