<?php
include('../../../model/admin/pagos/agregar_horas_model.php');

$consult=new agregar_horas_model();
$docentes=$consult->traer_docentes();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docente =$_POST['docente'];
    $horas =$_POST['horas'];
    if (is_numeric($horas) && $horas == (int)$horas) {
        $pago=$consult->realizar_pago($docente,$horas);
        if($pago){
            $mensaje='Las horas se agregaron correctamente';
        }else{
            $mensaje='No se agregaron las horas';
            header('location: controller_agregar_horas.php?mensaje='.$mensaje.'');
            exit();
        }
    } else {
        $mensaje= 'Las horas ingresadas deben ser numericas';
        header('location: controller_agregar_horas.php?mensaje='.$mensaje.'');
        exit();
    }
}

if($_GET['mensaje']){
    $mensaje=$_GET['mensaje'];
}

include('../../../view/admin/paginas/pagos/agregar_horas.php');
?>