<?php
session_start();
include('../../../model/admin/modalidades/modalidades_model.php');
$ruta_inicio = '../../../';
$model = new buscar_modalidad_model();

try {
    if(isset($_POST['id_modalidad'])) {
        $modalidad_id = $_POST['id_modalidad'];
        $eliminacion_exitosa = $model->desactivar_modalidad($modalidad_id);

        if($eliminacion_exitosa) {
            echo 'success';
            exit(); 
        } else {
            echo 'error';
            exit();
        }
    }

    if(isset($_GET['eliminar_modalidad'])) {
        $modalidad_id = $_GET['eliminar_modalidad'];
        $eliminacion_exitosa = $model->desactivar_modalidad($modalidad_id);

        if($eliminacion_exitosa) {
            echo 'success';
            exit(); 
        } else {
            echo 'error';
            exit();
        }
    }

    $modalidades = $model->traer_modalidad();

    include('../../../view/admin/paginas/modalidades/modalidad_clase.php');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>






