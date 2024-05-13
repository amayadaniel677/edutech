
<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/usuarios/buscar_usuario_model.php');
$consult = new buscar_usuario_controlador();
if (isset($_GET['tipo_usuario'])) {
    $tipo_usuario = $_GET['tipo_usuario'];
    $consult = new buscar_usuario_model();
    $usuarios = $consult->traer_usuarios($tipo_usuario);
    $bandera = true;
}


if (isset($_GET['msj_eliminar'])) {
    $msj_eliminar = $_GET['msj_eliminar'];
}

if (isset($_GET['mensaje'])) {
    $mensaje_editar = $_GET['mensaje'];
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['docente_id'])) {
    $consult2 = new buscar_usuario_model();
    $horas = $_POST['horas'];
    $docente = $_POST['docente_id'];

    if (empty($horas)) {
        $mensaje = 'por favor valide los campos';
    } else {
        if (is_numeric($horas) && $horas == (int)$horas) {
            $pago = $consult2->realizar_pago($docente, $horas);
            if ($pago) {
                $msj_eliminar = '';
                $msj_error='';
                $cant_horas = $consult2->traer_horas($docente);
                $mensaje_editar = 'Las horas se agregaron correctamente ahora suman: ' . $cant_horas['total_hours'];
                // refrescar la pagina para que se actualice la tabla
                header('refresh:4;url=controller_usuarios_totales.php?tipo_usuario=' . $tipo_usuario);
            } else {
                $msj_eliminar = 'No se agregaron las horas';
            }
        } else {
            $msj_eliminar = 'Las horas ingresadas deben ser numericas';
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['estudiante_id_form'])) {
    $consult3 = new buscar_usuario_model();
    $horasAsistidas = $_POST['horasAsistidas'];
    $cursoSeleccionado = $_POST['cursoSeleccionado'];
    if($cursoSeleccionado==''){
        $msj_error='Por favor seleccione un curso para agregar horas';
    }else{
// enviar al modelo para registrarhorasasistidas
$asistenciaHoras = $consult3->agregarHorasAsistidas($horasAsistidas,$cursoSeleccionado);
if(is_array($asistenciaHoras)){
    $msj_error='Error de cantidad:'.$horasAsistidas." ingresadas de ".$asistenciaHoras['horasRestantes']." disponibles" ;
}elseif($cursoSeleccionado){

}
elseif($asistenciaHoras){
    $mensaje_editar = 'Operación exitosa. Horas restantes del estudiante: '.$asistenciaHoras;
    header('refresh:4;url=controller_usuarios_totales.php?tipo_usuario=' . $tipo_usuario);
}
}
    
   
}




class buscar_usuario_controlador
{
    public $mensaje = [];
    public function __construct()
    {
    }

    public function traer_usuarios($tipo_usuario)
    {
        $consult = new buscar_usuario_model();
        $usuarios = $consult->traer_usuarios($tipo_usuario);
        if ($usuarios) {
            return $usuarios;
        } else {
            return false;
        }
    }

    public function buscar_usuario($dni)
    {
        $dni = trim($dni);
        $consult = new buscar_usuario_model();
        $usuario = $consult->buscar_usuario($dni);
        if ($usuario) {
            return $usuario;
        } else {
            return false;
        }
    }

    public function mostrarMensajes()
    {
        $html = '<h1 class="text-white bg-danger">';
        foreach ($this->mensaje as $mensaje) {
            $html .= $mensaje . '<br>';
        }
        $html .= '</h1>';
        return $html;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['estudiante_id'])) {
   
    $estudianteId = $_POST['estudiante_id'];
    header('Content-Type: application/json');
    // Aquí va tu lógica para buscar los cursos del estudiante por su ID
    $consultAjax = new buscar_usuario_model();
    $cursosActivos =$consultAjax->traer_cursos_activos($estudianteId) ; // Ejemplo de cómo podrías obtener los cursos

    // Devolver los cursos en formato JSON
    echo json_encode($cursosActivos);
} else {
include('../../../view/admin/paginas/usuarios/usuarios_totales.php');
  
}
?>