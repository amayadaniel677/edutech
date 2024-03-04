<?php
require('../model/update_model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['dni'];
    $rol = $_POST['rol'];
    $name = ucwords(strtolower((trim($_POST['name']))));
    $lastname = ucwords(strtolower((trim($_POST['lastname']))));
    $dni_type = $_POST['dni_type'];
    $dni = str_replace(' ', '', $_POST['dni']);
    $birthdate = new DateTime($_POST['birthdate']);
    $email = strtolower(str_replace(' ', '', $_POST['email']));
    $phone = str_replace(' ', '', $_POST['phone']);
    $city = strtolower(str_replace(' ', '', $_POST['city']));
    $address = trim(strtolower($_POST['address']));


    if (isset($_FILES['new-photo']) && $_FILES['new-photo']['error'] === UPLOAD_ERR_OK) {
        // Procesar la foto
        $new_photo = $_FILES['new-photo'];
        // Resto del código para procesar la foto
    } else {
        // No se envió ninguna foto o hubo un error durante la subida
        // Puedes manejar esta situación según tus necesidades
        $new_photo = false; // O cualquier otra acción que desees tomar
    }
   

    $old_photo = $_POST['old-photo'];
    if ($new_photo==false) {
        $foto = $old_photo;
        $update_user = new actualizar_datos();
    } else {
        $update_user = new actualizar_datos();
        $validar=$_FILES['new-photo']['tmp_name'];
        $foto = $update_user->validarFoto($_FILES['new-photo'], $documento, $old_photo);
    }
    if ($foto == false) {
        $mensaje = $update_user->msg_foto;
        
        
        switch ($rol) {
            case 'administrador':
                header("Location: admin/perfil/controller_perfil_admin.php?mensaje=" . urlencode($mensaje));
                break;

            case 'estudiante':
                header("Location: estudiante/controller_perfil_estudiante.php?mensaje=" . urlencode($mensaje));
                break;
            case 'docente':
                header("Location: docente/controller_perfil_docente.php?mensaje=" . urlencode($mensaje));
                break;

            default:
                header("Location: login_controller.php");
                break;
        }
       
        exit();
    } else {
        
        
        $update_user->validar($dni,$name,$lastname,$dni_type,$birthdate,$email,$phone,$city,$address,$foto);
        $mensaje=$update_user->msg_inputs;
        switch ($rol) {
            case 'administrador':
                header("Location: admin/perfil/controller_perfil_admin.php?mensaje=" . urlencode($mensaje));
                break;

            case 'estudiante':
                header("Location: estudiante/controller_perfil_estudiante.php?mensaje=" . urlencode($mensaje));
                break;
            case 'docente':
                header("Location: docente/controller_perfil_docente.php?mensaje=" . urlencode($mensaje));
                break;

            default:
                header("Location: login_controller.php");
                break;
        }
       exit();
    }
}

class actualizar_datos
{
    public $msg_foto;
    public $msg_inputs;
    public function validar($documento, $nombres, $apellidos, $tipo_documento, $fecha, $correo, $telefono, $ciudad, $direccion, $foto)
    {
        $fecha_hoy = new DateTime();

        $error = false; // Inicializar la bandera de error como falsa

        // Campos vacíos de registro
        if (empty($nombres) || empty($apellidos) || empty($tipo_documento) || empty($documento)  || empty($fecha) || empty($correo) || empty($telefono) || empty($ciudad) || empty($direccion) || empty($foto) ) {
            $this->msg_inputs = 'Verifique que los campos estén diligenciados';
            $error = true; // Cambiar la bandera de error a verdadera
        }


        // Validar que documento y teléfono solo contengan números
        if (!ctype_digit($telefono)) {
            $this->msg_inputs = 'Los campos de documento y telefono solo aceptan números!';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        // Validar que la fecha de nacimiento no sea posterior a la fecha actual
        if ($fecha > $fecha_hoy) {
            $this->msg_inputs = 'Fecha de nacimiento inválida!';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        // Si no hay errores, realizar el registro
        if (!$error) {

            $consult = new actualizar_user;
            $consult->actualizar_datos($documento, $nombres, $apellidos, $tipo_documento, $fecha, $correo, $telefono, $ciudad, $direccion, $foto);
        }
    }
    public function validarFoto($foto, $dni, $old_photo)
    {
        // VALIDAR TIPO DE IMAGEN
        $error = false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo = $foto['type'];

        if (!in_array($archivo_tipo, $tipos_permitidos)) {
            $this->msg_foto = 'Error: Solo se permiten archivos JPEG, JPG o PNG';
            $error = true;
            return;
        }

        // Validar el tamaño del archivo (10 MB en este ejemplo)
        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio = $foto['size'];

        if ($archivo_tamanio > $tamanio_maximo) {
            $this->msg_foto = 'Error: El tamaño del archivo excede el límite de 10 MB.';
            $error = true;
            return;
        }

        $carpeta_destino = '../resource/img/photosUsers/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        $carpeta_destino2 = 'resource/img/photosUsers/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $dni . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino2 . $nombre_archivo;
        $ruta_archivo_nombre_archivo = '../' . $ruta_archivo;

        // borrar foto
        $ruta_old_photo = '../' . $old_photo;
        $ruta_default_photo='resource/img/photosUsers/defaultPhoto.png';
        if($ruta_old_photo!=$ruta_default_photo){
            unlink($ruta_old_photo);
        }
        

        if (move_uploaded_file($foto['tmp_name'], $ruta_archivo_nombre_archivo) && $error==false ) {
            $this->msg_foto='Se movió el archivo sin errores';
            return ($ruta_archivo);
        } else {
            $this->msg_foto='foto con errores';
            return false;
        }
    }
}
