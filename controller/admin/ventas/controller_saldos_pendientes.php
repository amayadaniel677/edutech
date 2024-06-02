<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/ventas/saldos_pendientes_model.php');

// LOGICA
$consulta = new saldos_pendientes_model();
$abonos_pendientes = $consulta->traer_abonos_pendientes();
if(isset($_GET['mensaje_ok'])){
    $mensaje_ok=$_GET['mensaje_ok'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saldo_id'])) {
    $saldo_id = $_POST['saldo_id'];
    $valor_abono = $_POST['valor_abono'];
    $valor_abono_2= $_POST['valor_abono_2'];
    $modelo = new saldos_pendientes_model();
    if($valor_abono==$valor_abono_2){
        $resultado_modelo=$modelo->abonar_saldo($saldo_id, $valor_abono);
        if($resultado_modelo==1){
            $mensaje_error='';
            $mensaje_ok="Abono registrado correctamente";
            header('location:controller_saldos_pendientes.php?mensaje_ok='.$mensaje_ok);
        }else{
            $mensaje_ok='';
            $mensaje_error= $resultado_modelo;
        }
    }else{
        $mensaje_ok='';
        $mensaje_error="Error: los valores de abono no coinciden";  
    
    }
   
} 
include('../../../view/admin/paginas/ventas/saldos_pendientes.php');
