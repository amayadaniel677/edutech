<?php
session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/usuarios/editar_usuario_model.php');
if (isset($_GET['id_usuario'])) {
    $id_ususario = $_GET['id_usuario'];
    $consult = new editar_usuario_model();
    $usuario = $consult->traer_usuario($id_ususario);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $ciudad = $_POST['city'];
    $direccion = $_POST['address'];
    $fecha_nacimiento = $_POST['birthdate'];
    $sexo = $_POST['sex'];
    $correo = $_POST['email'];
    $tipo_documento = $_POST['dni_type'];

    $consult = new editar_usuario_controller();
    $validar = $consult->validar_campos($id, $nombre, $apellido, $ciudad, $direccion, $fecha_nacimiento, $sexo, $correo, $tipo_documento);
    if ($validar) {
        $mensaje = 'El usuario a sido modificado con exito';
        header("Location: controller_buscar_usuario.php?mensaje=" . urlencode($mensaje));
    } else {
        $mensaje = 'No se pudo editar al usuario';
    }
}

class editar_usuario_controller
{
    public $mensaje;
    public function __construct()
    {
    }

    public function validar_campos($id, $nombre, $apellido, $ciudad, $direccion, $fecha_nacimiento, $sexo, $correo, $tipo_documento)
    {
        // Validar que no estén vacíos
        if (empty($nombre) || empty($apellido) || empty($ciudad) || empty($direccion) || empty($correo)) {
            $this->mensaje = 'por favor valide los campos';
            exit;
        } else {

            // Eliminar espacios en blanco al principio y al final
            $nombre = trim($nombre);
            $apellido = trim($apellido);
            $ciudad = trim($ciudad);
            $direccion = trim($direccion);
            $correo = trim($correo);

            // Reemplazar múltiples espacios por uno solo
            $nombre = preg_replace('/\s+/', ' ', $nombre);
            $apellido = preg_replace('/\s+/', ' ', $apellido);
            $ciudad = preg_replace('/\s+/', ' ', $ciudad);

            // Convertir a minúsculas y asegurar que solo la primera letra de cada palabra esté en mayúsculas
            $nombre = ucwords(strtolower($nombre));
            $apellido = ucwords(strtolower($apellido));
            $ciudad = ucwords(strtolower($ciudad));

            // Eliminar números de las variables específicas
            $nombre = preg_replace('/[0-9]/', '', $nombre);
            $apellido = preg_replace('/[0-9]/', '', $apellido);
            $ciudad = preg_replace('/[0-9]/', '', $ciudad);

            $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);

            $fechaActual = new DateTime();

            $fechaLimite = $fechaActual->modify('-3 years');

            $fechaLimiteInferior = DateTime::createFromFormat('Y-m-d', '1960-01-01');

            if ($fechaNacimiento >= $fechaLimiteInferior && $fechaNacimiento <= $fechaLimite) {
                $fechaParaMySQL = $fechaNacimiento->format('Y-m-d');
                $consult = new editar_usuario_model();
                $editar = $consult->editar_informacion($id, $nombre, $apellido, $ciudad, $direccion, $fechaParaMySQL, $sexo, $correo, $tipo_documento);
                if ($editar) {
                    $mensaje = 'El usuario a sido editado con exito';
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }

        }
    }
}
include('../../../view/admin/paginas/usuarios/editar_usuario.php');
