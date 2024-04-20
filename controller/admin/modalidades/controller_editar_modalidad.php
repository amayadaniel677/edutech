<?php
include('../../../model/admin/modalidades/modalidades_model.php');


if (isset($_GET['id_modalidad'])) {
    $id_modalidad = $_GET['id_modalidad'];
    $model = new buscar_modalidad_model();
    $datos_modalidad = $model->traer_datos_editar($id_modalidad);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id =$_POST['id'];
    $price_hour_student =$_POST['price_hour_student'];
    $price_class_student =$_POST['price_class_student'];
    $price_teacher =$_POST['price_teacher'];

    $model = new buscar_modalidad_model();
    $datos_modalidad = $model->traer_datos_editar($id);

    $rta_actualizar= $model->actualizar_modalidad($id, $price_hour_student, $price_teacher, $price_class_student);
    if ($rta_actualizar) {
        $msg = 'Modalidad actualizada con exito!!';
        header("Location: controller_modalidades.php?msg=$msg");

    }
}


include('../../../view/admin/paginas/modalidades/editar_modalidad.php');

?>