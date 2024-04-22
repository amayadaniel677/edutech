<?php
include('../../../model/admin/pagos/agregar_horas_model.php');

$consult=new agregar_horas_model();
$docentes=$consult->traer_docentes();

if(isset($_GET['mensaje_ok'])){
    $mensaje_ok=$_GET['mensaje_ok'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docente =$_POST['docente'];
    $horas =$_POST['horas'];
    if(empty($horas)){
        $mensaje='por favor valide los campos';
    }else{
        if (is_numeric($horas) && $horas == (int)$horas) {
            $pago=$consult->realizar_pago($docente,$horas);
            if($pago){
                $cant_horas=$consult->traer_horas($docente);
                $mensaje_ok='Las horas se agregaron correctamente ahora suman: '. $cant_horas['total_hours'];
                header('location: controller_agregar_horas.php?mensaje_ok='.$mensaje_ok);
            }else{
                $mensaje='No se agregaron las horas';
                $_POST = array();
            }
        } else {
            $mensaje= 'Las horas ingresadas deben ser numericas';
            $_POST = array();
        }
    }
    
}

if(isset($_GET['mensaje'])){
    $mensaje=$_GET['mensaje'];
}

include('../../../view/admin/paginas/pagos/agregar_horas.php');
?>