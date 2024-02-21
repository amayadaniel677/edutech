<?php 
require_once('../model/user_model.php');
if(isset($_GET['mensaje'])){
    $mensaje=urldecode($_GET['mensaje']);
}
if($_POST){
    //guardar  variables
    $dni=str_replace(' ','',$_POST['dni']);
    $contrasenia=str_replace(' ','',$_POST['contrasenia']);

    $login = new login();
    $login->validar_login($dni,$contrasenia);
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
            $consult->user_exist($dni,$contrasenia);
        }
    }

}
require_once('../view/login.php');
?>