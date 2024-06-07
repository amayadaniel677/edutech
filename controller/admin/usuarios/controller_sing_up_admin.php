<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav
include('../../../model/admin/usuarios/sing_up_admin_model.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&
        empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0
    ) {
        $mensaje_info = "El archivo que envió excede nuestros limites, vuelva a intentarlo";
        $url = $_SERVER['REQUEST_URI'] . "?mensaje=" . urlencode($mensaje);
        header('location:' . $url);
        exit();
    }

    $rol = $_POST['rol'];
    $nombres = ucwords(strtolower((trim($_POST['nombres']))));
    $apellidos = ucwords(strtolower((trim($_POST['apellidos']))));
    $tipo_documento = $_POST['tipo_documento'];
    $documento = str_replace(' ', '', $_POST['documento']);
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $fecha = $_POST['fecha'];
    $correo = strtolower(str_replace(' ', '', $_POST['correo']));
    $telefono = str_replace(' ', '', $_POST['telefono']);
    $ciudad = strtolower(str_replace(' ', '', $_POST['ciudad']));
    $direccion = trim(strtolower($_POST['direccion']));
    $foto = $_FILES['foto'];

    if (empty($_POST['contrasenia'])) {
        $contrasenia = "NA";
    } else {
        $contrasenia = $_POST['contrasenia'];
    }

    if (empty($_POST['confContrasenia'])) {
        $confContrasenia = "NA";
    } else {
        $confContrasenia = $_POST['confContrasenia'];
    }

    if ($foto['error'] == UPLOAD_ERR_NO_FILE) {
        // No se ha enviado ninguna foto, utiliza la ruta predeterminada
        $new_user = new sing_up_admin();
        $foto = 'resource/img/photosUsers/defaultPhoto.png';
    } else {
        // Se ha enviado una foto, valida y guarda la foto
        $new_user = new sing_up_admin();
        $foto = $new_user->validarFoto($_FILES['foto'], $documento);
    }
    $msg = $new_user->msg;


    if (empty($msg)) {
        $insertar_modelo = $new_user->validar($rol, $nombres, $apellidos, $tipo_documento, $documento, $sexo, $fecha, $correo, $contrasenia, $confContrasenia, $telefono, $ciudad, $direccion, $foto);
        if (!$insertar_modelo) {
            $errores = $new_user->msg;
        } elseif ($insertar_modelo === 'Error! el usuario ya está registrado') {

            $mensaje_error = 'Error! el usuario ya está registrado';
        } else {
            // FUNCIONA
            $mensaje_error = '';
            $mensaje_ok = "Usuario agregado correctamente";
            // redireccionar a la misma vista
            // header('refresh:4; url=controller_sing_up_admin.php');
        }
    } else {
        // FUNCIONA BIEN
        $errores = $msg;
    }
}



class sing_up_admin
{
    public $msg = [];
    public function __construct()
    {
    }

    public function validar($rol, $nombres, $apellidos, $tipo_documento, $documento, $sexo, $fecha, $correo, $contrasenia, $confContrasenia, $telefono, $ciudad, $direccion, $foto)
    {

        $error = false; // Inicializar la bandera de error como falsa

        // Campos vacíos de registro
        if (empty($rol) || empty($nombres) || empty($apellidos) || empty($tipo_documento) || empty($documento) || empty($sexo) || empty($fecha) || empty($correo) || empty($contrasenia) || empty($confContrasenia) || empty($telefono) || empty($ciudad) || empty($direccion)) {
            echo 'Campos vacíos';
            $this->msg[] = 'Verifique que los campos estén diligenciados';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        // Validar las contraseñas
        if ($contrasenia !== $confContrasenia) {
            $this->msg[] = 'Las contraseñas no coinciden';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        // Validar que documento y teléfono solo contengan números
        if (!ctype_digit($documento) || !ctype_digit($telefono)) {
            $this->msg[] = 'Los campos de documento y telefono solo aceptan números!';
            $error = true; // Cambiar la bandera de error a verdadera
        }
        if (!preg_match('/^\d{7,11}$/', $telefono)) {
            $this->msg[] = 'Teléfono inválido. Debe tener entre 7 y 11 dígitos.';
            $error = true;
        }
        if (!preg_match('/^\d{5,12}$/', $documento)) {
            $this->msg[] = 'DNI inválido. Debe tener entre 5 y 12 dígitos.';
            $error = true;
        }
        $fechaNacimiento = new DateTime($fecha);
        $fechaMinima = new DateTime();
        $fechaMinima->modify('-2 years');
        $fechaMinima->modify('+1 day'); // Asegurar que sea al menos 2 años antes de hoy

        // Crear un objeto DateTime para el año 1950
        $fechaLimite = new DateTime('1950-01-01');

        if ($fechaNacimiento > $fechaMinima || $fechaNacimiento < $fechaLimite) {
            // var_dump($fechaNacimiento);
            // var_dump($fechaLimite);
            $this->msg[] = 'Edad del usuario no valida: <br> Debe haber nacido después de 1950 <br>Debe tener minimo dos años de edad';
            $error = true;
        }
        // Si no hay errores, realizar el registro
        if ($contrasenia == 'NA' || $confContrasenia == 'NA') {
            if (!$error) {
                $contrasenia_encriptada = 'NA';
                $consult = new sing_up_model;
                $return = $consult->insertar($rol, $nombres, $apellidos, $tipo_documento, $documento, $sexo, $fecha, $correo, $contrasenia_encriptada, $telefono, $ciudad, $direccion, $foto);
                if ($return == 1) {

                    return true;
                } else if ($return == 'Error! el usuario ya está registrado') {
                    return 'Error! el usuario ya está registrado';
                } else {
                    $this->msg[] = 'Error en el modelo de insertar';
                }
            }
        } else {
            if (!$error) {
                $contrasenia_encriptada = password_hash($contrasenia, PASSWORD_DEFAULT, ['cost' => 10]);
                $consult = new sing_up_model;
                $return = $consult->insertar($rol, $nombres, $apellidos, $tipo_documento, $documento, $sexo, $fecha, $correo, $contrasenia_encriptada, $telefono, $ciudad, $direccion, $foto);
                if ($return == 1) {

                    return true;
                } else if ($return == 'Error! el usuario ya está registrado') {
                    return 'Error! el usuario ya está registrado';
                } else {
                    $this->msg[] = 'Error en el modelo de insertar';
                }
            }
        }
    }

    public function validarFoto($foto, $dni)
    {
        // VALIDAR TIPO DE IMAGEN
        $error = false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo = $foto['type'];

        if (!in_array($archivo_tipo, $tipos_permitidos)) {
            $this->msg[] = 'Error: Solo se permiten archivos JPEG, JPG o PNG';
            $error = true;
        }

        // Validar el tamaño del archivo (10 MB en este ejemplo)
        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio = $foto['size'];

        if ($archivo_tamanio > $tamanio_maximo) {
            $this->msg[] = 'Error: El tamaño del archivo excede el límite de 10 MB.';
            $error = true;
        }

        $carpeta_destino = '../../../resource/img/photosUsers/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        $carpeta_destino2 = 'resource/img/photosUsers/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $dni . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino2 . $nombre_archivo;
        $ruta_archivo_nombre_archivo = '../../../' . $ruta_archivo;

        if ($error) {
            return false;
            exit();
        }
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_archivo_nombre_archivo)) {
            return ($ruta_archivo);
        } else {
            return false;
        }
    }
}
include('../../../view/admin/paginas/usuarios/sing_up_admin.php');
