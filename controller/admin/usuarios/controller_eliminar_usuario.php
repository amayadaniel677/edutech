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
    if($accion=='activar'){
        $accion2='active';
    }elseif($accion='desactivar'){
        $accion2='inactive';
    }
    $consult=new eliminar_usuario();
    $eliminar=$consult->validar_eliminar($id_usuario,$accion2);
    if($eliminar){
        if($accion2=='active'){
            $accion3='activado';
        }else{
            $accion3='desactivado';
        }
           
        $msj_eliminar='El usuario fue '.$accion3.' con exito';
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