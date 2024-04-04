<?php
session_start();
include('../../../model/admin/areas/vincular_docente_model.php');


$consult = new vincular_docente_model();
$areas = $consult->traer_areas();
$docentes = $consult->traer_docentes();
// ...



// ...

// Verificar si han enviado un docente para desvincular
if (isset($_GET['idDesvincular'])) {
    $id_desvincular = $_GET['idDesvincular'];
    if ($consult->inactivar_docente($id_desvincular)) {
        $mensaje = 'docente desvinculado con exito';
    }
}
if ($_POST) {
    $id_area = $_POST['area'];
    $id_docente = $_POST['docente'];
    if ($id_area == 'false' || $id_docente == 'false') {
        $error = "Seleccione un docente y un area";
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
            $error = "Error al vincular el docente";
            // Redirigir al usuario a la misma página con un mensaje de error
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($error));
            exit();
        }
    }
}




include('../../../view/admin/paginas/areas/vincular_docente.php');
