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
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $id_usuario_post=$_POST['id_usuario_post'];
    $tipo_usuario_post=$_POST['tipo_usuario_post'];
    $consult=new eliminar_usuario();
    $eliminar=$consult->validar_eliminar($id_usuario_post);
    if($eliminar){
        $msj_eliminar='El usuario fue eliminado con exito';
        header("Location: controller_usuarios_totales.php?msj_eliminar=" . urlencode($msj_eliminar) . "&tipo_usuario=" . urlencode($tipo_usuario_post));
    }else{
        $msj_eliminar='El usuario no pudo ser eliminado intentelo nuevamente';
        header("Location: controller_usuarios_totales.php?msj_eliminar=" . urlencode($msj_eliminar) . "&tipo_usuario=" . urlencode($tipo_usuario_post));
        }
    


}

class eliminar_usuario{
    public function __construct()
    {
        
    }

    public function validar_eliminar($id){
        $consult= new eliminar_usuarios_model();
        $eliminar=$consult->eliminar_usuario($id);
        if($eliminar){
            return true;
        }else{
            return false;
        }
    }
}

include('../../../view/admin/paginas/usuarios/eliminar_usuario.php');
?>