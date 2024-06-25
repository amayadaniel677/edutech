<?php
session_start();
require '../../vendor/autoload.php';
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include('../../model/recuperar_password/recuperarCon_model.php');
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['dni'])) {
        $email = trim($_POST['email']);
        $dni = trim($_POST['dni']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'El correo electrónico no tiene un formato válido.';
        }

        if (!is_numeric($dni)) {
            $errors[] = 'El DNI no tiene un formato válido.';
        }

        if (empty($errors)) {
            $recuperar = new recuperar_con();
            $recuperar_contra = $recuperar->emailExiste($email, $dni);

            if (is_array($recuperar_contra)) {
                if ($recuperar_contra['email'] == $email && $recuperar_contra['dni'] == $dni) {
                    try {
                        $mail = new PHPMailer(true);

                        $mail->isSMTP();
                        $mail->SMTPDebug = 0;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 587;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'edutech437@gmail.com';
                        $mail->Password = 'lkjm olhp qwdq fjrm';

                        $mail->setFrom('edutech437@gmail.com', 'EDUTECH');
                        $mail->addAddress($email, 'user');
                        $mail->CharSet = 'UTF-8';
                        $mail->Encoding = 'base64';

                        $mail->isHTML(true);
                        $mail->Subject = 'RECUPERACION DE CONTRASEÑA EDUTECH';
                        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
                      
                        $token = $recuperar->generarToken($email);
                        $link = "https://edutech.appimrc2024.site/controller/recuperar_password/confirmar_contra_controller.php?token=$token";
                        $mail->Body = 'Haz clic en el siguiente enlace para restablecer tu contraseña: <a href="' . $link . '">Restablecer Contraseña</a>';
                        

                        if ($mail->send()) {
                            $errors[] = 'Se ha enviado el correo exitosamente, revise su cuenta.';
                        }
                    } catch (Exception $e) {
                        $errors[] = 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
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

if (!empty($errors)) {
    $_SESSION['message'] = implode('<br>', $errors);
}

include('../../view/recuperar_password/recuperar.php');
?>



