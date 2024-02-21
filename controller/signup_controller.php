<?php 
require('../model/user_model.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombres=ucwords(strtolower((trim($_POST['nombres']))));
    $apellidos=ucwords(strtolower((trim($_POST['apellidos']))));
    $tipo_documento=$_POST['tipo_documento'];
    $documento=str_replace(' ','',$_POST['documento']);
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $fecha=new DateTime($_POST['fecha']);
    $correo=strtolower(str_replace(' ','',$_POST['correo']));
    $contrasenia=$_POST['contrasenia'];
    $confContrasenia=$_POST['confContrasenia'];
    $telefono=str_replace(' ','',$_POST['telefono']);
    $ciudad=strtolower(str_replace(' ','',$_POST['ciudad']));
    $direccion=trim(strtolower($_POST['direccion']));
    
    $new_user=new signup();
    $new_user->validar($nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia,$confContrasenia,$telefono,$ciudad,$direccion);
    $msg=$new_user->msg;
    
}


class signup{   
    public $msg=[];
    public function validar($nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia,$confContrasenia,$telefono,$ciudad,$direccion){
        $fecha_hoy=new DateTime();

        $error = false; // Inicializar la bandera de error como falsa

        // Campos vacíos de registro
        if(empty($nombres)||empty($apellidos)||empty($tipo_documento)||empty($documento)||empty($sexo)||empty($fecha)||empty($correo)||empty($contrasenia)||empty($confContrasenia)||empty($telefono)||empty($ciudad)||empty($direccion)){
          $this->msg[]='Verifique que los campos estén diligenciados';
          $error = true; // Cambiar la bandera de error a verdadera
        }
        
        // Validar las contraseñas
        if($contrasenia !== $confContrasenia){
            $this->msg[]='Las contraseñas no coinciden';
            $error = true; // Cambiar la bandera de error a verdadera
        }
        
        // Validar que documento y teléfono solo contengan números
        if(!ctype_digit($documento) || !ctype_digit($telefono)){
            $this->msg[]='Los campos de documento y telefono solo aceptan números!';
            $error = true; // Cambiar la bandera de error a verdadera
        }
        
        // Validar que la fecha de nacimiento no sea posterior a la fecha actual
        if($fecha > $fecha_hoy){
            $this->msg[]='Fecha de nacimiento inválida!';
            $error = true; // Cambiar la bandera de error a verdadera
        }
        
        // Si no hay errores, realizar el registro
        if(!$error){
            $contrasenia_encriptada=password_hash($contrasenia,PASSWORD_DEFAULT,['cost'=>10]);
            $consult=new user_consult;
            $consult->insertar($nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia_encriptada,$telefono,$ciudad,$direccion); 
        }
    }
}


require_once('../view/sign_up_user.php');


?>