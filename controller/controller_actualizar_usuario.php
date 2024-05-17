<?php

require('../model/update_model.php');

class obtener_datos
{
    public $errores_inputs = array();
    public $errores_foto = array();
    public $errores_contrasenia = array();
    public function validar_inputs($documento, $nombres, $apellidos, $tipo_documento, $fecha, $correo, $telefono, $ciudad, $direccion)
    {
        $fecha_hoy = new DateTime();
        $error = false; // Inicializar la bandera de error como falsa

        // Campos vacíos de registro
        if (empty($nombres) || empty($apellidos) || empty($tipo_documento) || empty($documento)  || empty($fecha) || empty($correo) || empty($telefono) || empty($ciudad) || empty($direccion)) {
            $this->errores_inputs[] = 'Verifique que los campos estén diligenciados';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        // Validar que documento y teléfono solo contengan números
        if (!ctype_digit($telefono)) {
            $this->errores_inputs[] = 'Los campos de documento y telefono solo aceptan números!';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        // Validar que la fecha de nacimiento no sea posterior a la fecha actual
        if ($fecha > $fecha_hoy) {
            $this->errores_inputs[] = 'Fecha de nacimiento inválida!';
            $error = true; // Cambiar la bandera de error a verdadera
        }

        return $error;
    }
    public function validar_foto($foto, $dni, $old_photo)
    {
        // VALIDAR TIPO DE IMAGEN
        $error = false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo = $foto['type'];

        if (!in_array($archivo_tipo, $tipos_permitidos)) {
            $this->errores_foto[] = 'Error: Solo se permiten archivos JPEG, JPG o PNG';
            $error = true;
        }

        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio = $foto['size'];

        if ($archivo_tamanio > $tamanio_maximo) {
            $this->errores_foto[] = 'Error: El tamaño del archivo excede el límite de 10 MB.';
            $error = true;
        }
        return $error;
    }
    public function obtener_ruta_foto($foto, $dni, $old_photo)
    {
        $carpeta_destino = 'resource/img/photosUsers/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $dni . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino . $nombre_archivo;
        return $ruta_archivo;
        // esto devuelve resource/img/photosUsers/dni_foto.png

    }

    public function mover_borrar_foto($dni, $foto_actual, $old_photo, $new_photo)
    {

        $carpeta_destino = '../resource/img/photosUsers/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }


        $ruta_archivo_nombre_archivo = '../' . $foto_actual;

        // borrar foto
        $ruta_old_photo = '../' . $old_photo;
        $ruta_default_photo = 'resource/img/photosUsers/defaultPhoto.png';


        if ($new_photo != false) {
            if (move_uploaded_file($new_photo['tmp_name'], $ruta_archivo_nombre_archivo)) {
                if ($ruta_old_photo != $ruta_default_photo && $old_photo != $foto_actual) {
                    unlink($ruta_old_photo);
                }
            }
        }
    }
    public function validar_contrasenia($dni, $contrasenia_actual, $contrasenia_nueva, $confirmar_contrasenia_nueva, $contrasenia_sesion)
    {
        $error = false;
        if (empty($contrasenia_actual) || empty($contrasenia_nueva) || empty($confirmar_contrasenia_nueva)) {
            $error = true;
            $this->errores_contrasenia[] = 'Verifica que todos los campos estén llenos';
        }
        if ($contrasenia_nueva != $confirmar_contrasenia_nueva) {
            $error = true;
            $this->errores_contrasenia[] = 'La contraseña nueva no coincide';
        }
        if (!password_verify($contrasenia_actual, $contrasenia_sesion)) {
            $error = true;
            $this->errores_contrasenia[] = 'La contraseña actual ingresada es incorrecta';
        }

        if ($error == false) {
            $contrasenia_bd = password_hash($contrasenia_nueva, PASSWORD_DEFAULT, ['cost' => 10]);
            return $contrasenia_bd;
        }
    }
    public function redirigir_vista($rol)
    {
        switch ($rol) {
            case 'docente':
                header("Location: docente/controller_perfil_docente.php");
                break;
            case 'estudiante':
                header("Location: estudiante/controller_perfil_estudiante.php");
                break;
            case 'administrador':
                header("Location: admin/perfil/controller_perfil_admin.php");
                break;

            default:
                header("Location: login_controller.php");
                break;
        }
    }
    public function redirigir_vista_msg($rol, $msg)
    {
        switch ($rol) {
            case 'docente':
                header("Location: docente/controller_perfil_docente.php?mensaje=" . urlencode($msg));
                break;
            case 'estudiante':
                header("Location: estudiante/controller_perfil_estudiante.php?mensaje=" . urlencode($msg));
                break;
            case 'administrador':
                header("Location: admin/perfil/controller_perfil_admin.php?mensaje=" . urlencode($msg));
                break;

            default:
                header("Location: login_controller.php");
                break;
        }
    }
}
















if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // LOGICA PARA ACTUALIZAR DATOS PERSONAS SIN CONTRASEÑA
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&
        empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0
    ) {
        $mensaje = "El archivo que envió excede nuestros limites, vuelva a intentarlo";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $colapso = new obtener_datos();
        $rol = $_SESSION['rol_session'];
        $colapso->redirigir_vista_msg($rol, $mensaje);
    }
    if (isset($_POST['email'])) {
        $documento = $_POST['dni'];
        $rol = $_POST['rol'];
        $old_photo = $_POST['old-photo'];
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
            $validaciones = new obtener_datos();
            $errores_foto = $validaciones->validar_foto($new_photo, $old_photo, $dni);
            $foto = $validaciones->obtener_ruta_foto($new_photo, $dni, $old_photo);
        } else {
            $new_photo = false;
            $validaciones = new obtener_datos();
            $errores_foto = false;
            $foto = $old_photo; // O cualquier otra acción que desees tomar
        }



        $errores_inputs = $validaciones->validar_inputs($dni, $name, $lastname, $dni_type, $birthdate, $email, $phone, $city, $address);



        if (!$errores_foto && !$errores_inputs) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['update-succes'] = "INFORMACIÓN ACTUALIZADA CORRECTAMENTE!";
            $actualizar_model = new actualizar_user();
            $actualizar_datos = $actualizar_model->actualizar_datos($dni, $name, $lastname, $dni_type, $birthdate, $email, $phone, $city, $address, $foto, $old_photo, $new_photo);
            // Redirige a la vista
            $validaciones->redirigir_vista($rol);
        } else {

            // Inicia la sesión si no está iniciada
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['errores_foto'] = $validaciones->errores_foto;
            $_SESSION['errores_inputs'] = $validaciones->errores_inputs;

            $validaciones->redirigir_vista($rol);

            exit();
        }

        // LOGICA PARA ACTUALIZAR LA CONTRASEÑA UNICAMENTE
    } elseif (isset($_POST['current-password'])) {
        $dni = $_POST['dni'];
        $rol = $_POST['rol'];
        $contrasenia_sesion = $_POST['password-session'];
        $contrasenia_actual = $_POST['current-password'];
        $contrasenia_nueva = $_POST['new-password'];
        $confirmar_contrasenia_nueva = $_POST['confirm-new-password'];
        $error_validaciones = new obtener_datos();
        $resultado = $error_validaciones->validar_contrasenia($dni, $contrasenia_actual, $contrasenia_nueva, $confirmar_contrasenia_nueva, $contrasenia_sesion);
        if (empty($resultado)) {
            $errores_vista = $error_validaciones->errores_contrasenia;
            // Inicia la sesión si no está iniciada
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['errores_inputs'] = $errores_vista;
            $error_validaciones->redirigir_vista($rol);
            exit();
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $model_update = new actualizar_user();
            $resultado_modelo = $model_update->actualizar_contrasenia($dni, $resultado);
            if ($resultado_modelo == 1) {
                $_SESSION['update-succes'] = "CONTRASEÑA ACTUALIZADA CORRECTAMENTE!";
            } else {
                $_SESSION['errores-inputs'] = "Error en la conexión con la base de datos, intente más tarde!";
            }
            $error_validaciones->redirigir_vista($rol);
        }

        // if($resultado){
        //     $errores=$error_validaciones->errores_contrasenia;
        //     foreach( $errores as $error){
        //         echo $error;
        //     }
        // }else{
        //     echo $resultado;
        // }


    }
}
