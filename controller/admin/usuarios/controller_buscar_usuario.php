<?php 
include('../../../model/admin/usuarios/buscar_usuario_model.php');
$consult= new buscar_usuario_controlador();
$usuarios=$consult->traer_usuarios();
$bandera= false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $dni=$_POST['dni'];
    $buscar_usuario=$consult->buscar_usuario($dni);
    $mensaje=$consult->mostrarMensajes();
    $bandera=true;
}

class buscar_usuario_controlador{
    public $mensaje=[];
    public function __construct()
    {
        
    }

    public function traer_usuarios(){
        $consult= new buscar_usuario_model();
        $usuarios=$consult->traer_usuarios();
        if($usuarios){
            return $usuarios;
        }else{
            return false;
        }
    }

    public function buscar_usuario($dni){
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
include('../../../view/admin/paginas/usuarios/buscar_usuario.php');
?>