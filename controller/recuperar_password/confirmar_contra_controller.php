<?php
session_start();

include('../../model/recuperar_password/recuperarCon_model.php');

if ($_POST) {
    // Obtener los datos del formulario
    $dni = $_POST['dni'];
    $contrasenia = $_POST['password'];
    $confir_password = $_POST['confir_password'];

    $errors = [];
    
    // Verificar si las contraseñas coinciden
    if ($contrasenia != $confir_password) {
        $errors['contrasenia'] = "Las contraseñas no coinciden.";
    }

    // Obtener el token de la sesión
    $recuperar_con = new recuperar_con();
    $token = $_GET['token'];
    $correo_usuario = $recuperar_con->verificarToken($token);
    
    if (!$correo_usuario) {
        $errors['token'] = "El enlace para restablecer la contraseña es inválido o ha expirado.";
    } else {
        // Verificar si el DNI es válido y obtener el correo asociado
        $correo_recuperacion = $recuperar_con->getCorreoFromDNI($dni);
    
        if ($correo_recuperacion !== $correo_usuario) {
            $errors['dni'] = "El DNI ingresado no corresponde al correo asociado.";
        }
    }
    

    // Si no hay errores, modificar la contraseña
    if (empty($errors)) {
        try {
            if ($recuperar_con->modificarContrasenia($dni, $contrasenia)) {
                // Eliminar el token después de usarlo
                $recuperar_con->eliminarToken($token);
                
                $errors['success'] = "La contraseña se restauró correctamente.";
                header('location:../login_controller.php');
                exit(); // Asegurar que el script termine después de redireccionar
            }
        } catch (\Throwable $th) {
            $errors['general'] = "No se pudo cambiar la contraseña.";
        }
    }
}

include('../../view/recuperar_password/restaurar_contraseña.php');
?>


