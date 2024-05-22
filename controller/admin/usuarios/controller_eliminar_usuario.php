<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/usuarios/eliminar_usuarios_model.php');
if(isset($_GET['id_usuario'])){
    $id_usuario = $_GET['id_usuario'];
    $tipo_usuario = $_GET['tipo_usuario'];
    $accion=$_GET['accion'];
    $accion == "activar"? "active" : "inactive";
    $consult=new eliminar_usuario();
    $eliminar=$consult->validar_eliminar($id_usuario,$accion);
    if($eliminar){
        $accion == "active"? "activado" : "desactivado";
        $msj_eliminar='El usuario fue'.$accion.'con exito';
        header("Location: controller_usuarios_totales.php?msj_eliminar=" . urlencode($msj_eliminar) . "&tipo_usuario=" . urlencode($tipo_usuario));
    }else{
        $msj_eliminar='El usuario no pudo ser eliminado intentelo nuevamente';
        header("Location: controller_usuarios_totales.php?msj_eliminar=" . urlencode($msj_eliminar) . "&tipo_usuario=" . urlencode($tipo_usuario));
        }
    

}



class eliminar_usuario{
    public function __construct()
    {
        
    }

    public function validar_eliminar($id,$accion){
        $consult= new eliminar_usuarios_model();
        $eliminar=$consult->eliminar_usuario($id,$accion);
        if($eliminar){
            return true;
        }else{
            return false;
        }
    }
}


?>