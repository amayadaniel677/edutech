

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
    $email = trim($_POST['email']);
    $dni = ($_POST['dni']);
    $recuperar = new recuperar_con();
    $recuperar_contra = $recuperar->emailExiste($email, $dni);

    if ($recuperar_contra) {
        // El correo coincide con el usuario


        //$recuperar->modificarContrasenia($user_id, $token);
        try {
            // Enviar correo electrónico con el enlace de restablecimiento
            $mail = new PHPMailer(true);
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
        }
        //code...
        catch (\Throwable $th) {
            //throw $th;
            $_SESSION['message'] = 'Error al enviar el correo electronico' . $th;
        }
    } else {
        $_SESSION['message'] = 'el correo no coincide ';
    }
}
include('../../view/recuperar_password/recuperar.php');
