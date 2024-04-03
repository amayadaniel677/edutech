

<?php
require '../../vendor/autoload.php';
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// Crear una instancia de la clase recuperar_con

include('../../model/recuperar_password/recuperarCon_model.php');
$errors = [];

if ($_POST) {
    // Verifica si la clave 'email' está presente en el array $_POST
    if (isset($_POST['email']) && isset($_POST['dni'])) {
        $email = trim($_POST['email']);
        $dni = ($_POST['dni']);
        $recuperar = new recuperar_con();
        
        // Validar si el correo y el DNI existen en la base de datos
        $recuperar_contra = $recuperar->emailExiste($email, $dni);

        if ($recuperar_contra) {
            // Verificar si el correo corresponde al DNI del mismo usuario
            if (isset($recuperar_contra['email'], $recuperar_contra['dni']) && $recuperar_contra['email'] === $email && $recuperar_contra['dni'] === $dni) {
                // El correo y el DNI coinciden con un usuario en la base de datos

                try {
                    // Envía el correo de recuperación
                    $mail = new PHPMailer(true);
                    // Configuración del correo omitida por brevedad
$mail->isSMTP();

            //permite modo debug para ver mensajes de las cosas que van ocurriendo
            $mail->SMTPDebug = 0;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //$mail->SMTPAutoTLS  = "false";
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
            //cambiar cuando se suba al hosting
            $mail->Body = 'Haz clic en el siguiente enlace para restablecer tu contraseña: <a href="http://localhost/edutech-project/controller/recuperar_password/confirmar_contra_controller.php">Restablecer Contraseña</a>';


                    if ($mail->send()) {
                        $_SESSION['message'] = 'Se ha enviado el correo exitosamente, revise su cuenta.';
                    }
                } catch (\Throwable $th) {
                    $_SESSION['message'] = 'Error al enviar el correo electrónico' . $th;
                }
            } else {
                $_SESSION['message'] = 'Los datos proporcionados no coinciden para este usuario.';
            }
        } else {
            $_SESSION['message'] = 'Los datos proporcionados no coinciden con ningún usuario.';
        }
    } else {
        $_SESSION['message'] = 'Falta el correo o el DNI en el formulario.';
    }
}


include('../../view/recuperar_password/recuperar.php');
