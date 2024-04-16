<?php
require '../../vendor/autoload.php';
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Crear una instancia de la clase recuperar_con
include('../../model/recuperar_password/recuperarCon_model.php');
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar correo electrónico y DNI
    if (!empty($_POST['email']) && !empty($_POST['dni'])) {
        $email = trim($_POST['email']);
        $dni = trim($_POST['dni']);

        // Validar correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El correo electrónico no tiene un formato válido.';
        }

        // Validar DNI
        if (!is_numeric($dni) ) {
            $errors[] = 'El DNI no tiene un formato válido.';
        }

        if (empty($errors)) {
            $recuperar = new recuperar_con();
            

            // Validar si el correo y el DNI existen en la base de datos
            $recuperar_contra = $recuperar->emailExiste($email, $dni);
            is_array($recuperar_contra);

            if ($recuperar_contra) {
                // Verificar si el correo corresponde al DNI del mismo usuario
                if ( $recuperar_contra['email'] == $email && $recuperar_contra['dni'] == $dni) {
                    
                    // El correo y el DNI coinciden con un usuario en la base de datos
                   
                    
                    try {
                        // Envía el correo de recuperación
                        $mail = new PHPMailer(true);

                        // Configuración del correo omitida por brevedad
                        $mail->isSMTP();
                        $mail->SMTPDebug = 0;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Host = 'smtp.hostinger.com';
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                        $mail->SMTPAuth = true;
                        $mail->Username = 'edutech_sena@edutechsena.online';
                        $mail->Password = 'Edutechadso2024*';
                        $mail->Port = 587;
                        $mail->setFrom('edutech_sena@edutechsena.online', 'Edutech SENA');
                        $mail->addAddress($email, 'user');
                        $mail->isHTML(true);
                        $mail->Subject = 'RECUPERACION DE CONTRASENIA';
                        $mail->Body = 'Haz clic en el siguiente enlace para restablecer tu contraseña: <a href="http://localhost/edutech/controller/recuperar_password/confirmar_contra_controller.php">Restablecer Contraseña</a>';

                        if ($mail->send()) {
                            $errors[] = 'Se ha enviado el correo exitosamente, revise su cuenta.';
                        }
                    } catch (\Throwable $th) {
                        $errors[] = 'Error al enviar el correo electrónico' . $th;
                    }
                } else {
                    $errors[] = 'Los datos proporcionados no coinciden para este usuario.';
                }
            } else {
                $errors[] = 'Los datos proporcionados no coinciden con ningún usuario.';
            }
        }
    } else {
        $errors[] = 'Falta el correo o el DNI en el formulario.';
    }
}

// Mostrar mensaje de error
if (!empty($errors)) {
    $_SESSION['message'] = implode('<br>', $errors);
}

include('../../view/recuperar_password/recuperar.php');
?>

