<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include("../../../model/admin/areas/desvincular_docente_model.php");
if(isset($_GET['id_people_area'])){
    $id_people_area=$_GET['id_people_area'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_post=$_POST['id_post'];
    $consult=new desvincular_docente_model();
    if($consult->desvincular($id_post)){
        $mensaje='El docente esta desvinculado';
        header("location: controller_buscar_area.php?mensaje=".$mensaje."");
    }else{
        $mensaje='No se pudo desvincular el docente';
        header("location: controller_buscar_area.php?mensaje=".$mensaje."");
    }
}

include("../../../view/admin/paginas/areas/desvincular_docente.php");
?>