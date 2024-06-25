<?php 
include_once('../model/user_model.php');
if(isset($_GET['mensaje'])){
    $mensaje=urldecode($_GET['mensaje']);
}
// Decodificar el mensaje de la URL


if($_POST){
    //guardar  variables
    $dni=str_replace(' ','',$_POST['dni']);
    $contrasenia=str_replace(' ','',$_POST['contrasenia']);

    $login = new login();
    $login->validar_login($dni,$contrasenia);
    $errores=$login->msg;
    
}

class login{
    public $msg=[];
    

    public function __construct(){

    }

    public function validar_login($dni,$contrasenia){
        
        $error=false;
        
        if(empty($dni) || empty($contrasenia)){
            $this->msg[]='Verifique que los campos estén diligenciados';
            $error = true;
        }
        if(!ctype_digit($dni)){
            $this->msg[]='El documento de identidad solo debe contener números!';
            $error = true; // Cambiar la bandera de error a verdadera
        }
        if(!$error){
            $consult=new user_consult();
            $respuesta=$consult->user_exist($dni,$contrasenia);
            if($respuesta){
                $datos_user=$consult->obtener_datos($dni);
                $this->iniciar_session($datos_user);
                $rol=$datos_user['rol'];
                if($rol=="administrador" || $rol=="superadmin"){
                    header('location: admin/controller_inicio_admin.php');
                }  
                if($rol=="docente"){
                    header('location: docente/controller_inicio_docente.php');
                }
                if($rol=="estudiante"){
                    header('location: estudiante/controller_inicio_estudiante.php');
                }
            }else{
                $this->msg[]='Documento o contraseña invalida!';
            }
            
            
        }
    }

    public function iniciar_session($datos_user){
            session_start();
            $_SESSION['dni_session']=$datos_user['dni'];
            $_SESSION['id_session']=$datos_user['id'];
            $_SESSION['name_session']=$datos_user['name'];
            $_SESSION['lastname_session']=$datos_user['lastname'];
            $_SESSION['dni_type_session']=$datos_user['dni_type'];
            $_SESSION['phone_session']=$datos_user['phone'];
            $_SESSION['city_session']=$datos_user['city'];
            $_SESSION['birthdate_session']=$datos_user['birthdate'];
            $_SESSION['address_session']=$datos_user['address'];
            $_SESSION['sex_session']=$datos_user['sex'];
            $_SESSION['email_session']=$datos_user['email'];
            $_SESSION['rol_session']=$datos_user['rol'];
            $_SESSION['password_session']=$datos_user['password'];
            $_SESSION['photo_session']=$datos_user['photo']; 
    }

    

    

}
require_once('../view/login.php');
?>