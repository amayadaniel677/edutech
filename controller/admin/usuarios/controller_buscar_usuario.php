<?php 
include('../../../model/admin/usuarios/buscar_usuario_model.php');
$consult= new buscar_usuario_controlador();
$usuarios=$consult->traer_usuarios();
$bandera= false;

// Número de resultados por página
$resultados_por_pagina = 5;

// Obtener la página actual
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el offset para la consulta SQL
$offset = ($pagina - 1) * $resultados_por_pagina;

// Calcular el número total de páginas
$total_paginas = ceil(count($usuarios) / $resultados_por_pagina);

// Obtener solo los resultados para la página actual
$usuarios_paginados = array_slice($usuarios, $offset, $resultados_por_pagina);


if(isset($_GET['idEliminar'])){
    $id_eliminar = $_GET['idEliminar'];
    $eliminar=$consult->eliminar($id_eliminar);
    if($eliminar){
        $mensaje_eliminar='Usuario eliminado con exito';
        header("Location: $archivoActual");
    }else{
        $mensaje_eliminar= 'El usuario no pudo ser eliminado';
    }
}
if (isset($_GET['mensaje'])) {
    $mensaje_editar = $_GET['mensaje'];
} 

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

    public function eliminar($id){
        $consult=new buscar_usuario_model();
        $eliminar=$consult->eliminar($id);
        if($eliminar){
            return true;
        }else{
            return false;
        }
        
    }

}

include('../../../view/admin/paginas/usuarios/buscar_usuario.php');
?>