
<?php 
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/usuarios/buscar_usuario_model.php');
$consult= new buscar_usuario_controlador();
if (isset($_GET['tipo_usuario'])) {
    $tipo_usuario = $_GET['tipo_usuario'];
    $consult= new buscar_usuario_model();
    $usuarios=$consult->traer_usuarios($tipo_usuario);
    $bandera= false;
}


if(isset($_GET['msj_eliminar'])){
    $msj_eliminar = $_GET['msj_eliminar'];
}

if (isset($_GET['mensaje'])) {
    $mensaje_editar = $_GET['mensaje'];
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $msj_eliminar='';
    $mensaje_editar='';
    $dni=$_POST['dni'];
    $usuario_filtrado=$consult->buscar_usuario($dni);
    $consult= new buscar_usuario_controlador();
    $mensaje=$consult->mostrarMensajes();
    $bandera=true;
}



class buscar_usuario_controlador{ 
    public $mensaje=[];
    public function __construct()
    {
        
    }

    public function traer_usuarios($tipo_usuario){
        $consult= new buscar_usuario_model();
        $usuarios=$consult->traer_usuarios($tipo_usuario);
        if($usuarios){
            return $usuarios;
        }else{
            return false;
        }
    }

    public function buscar_usuario($dni){
        $dni=trim($dni);
        $consult= new buscar_usuario_model();
        $usuario=$consult->buscar_usuario($dni);
        if($usuario){
            return $usuario;
        }else{
            return false;
        }
    }

    public function mostrarMensajes() {
        $html = '<h1 class="text-white bg-danger">';
        foreach ($this->mensaje as $mensaje) {
            $html .= $mensaje . '<br>';
        }
        $html .= '</h1>';
        return $html;
    }


}

include('../../../view/admin/paginas/usuarios/usuarios_totales.php');
?>