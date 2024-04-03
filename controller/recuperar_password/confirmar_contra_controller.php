<?php

include('../../model/recuperar_password/recuperarCon_model.php');
//

if ($_POST) {
    $dni = $_POST['dni'];
    $contrasenia = $_POST['password'];
    $confir_password = $_POST['confir_password'];

    $errors = [];
    if ($contrasenia != $confir_password) {
        $errors['contrasenia'] = "las contraseñas no coinciden";
    } else {
        try {
            $restaurar_password = new recuperar_con();
            if ($restaurar_password->modificarContrasenia($dni, $contrasenia)) {
                $errors['success'] = "la contraseña se restauro correctamente";
                header('location:../login_controller.php');
            }
        } catch (\Throwable $th) {

            $errors['general'] = "No se pudo cambiar la contraseña ";
        }
    }
}
include('../../view/recuperar_password/restaurar_contraseña.php');
