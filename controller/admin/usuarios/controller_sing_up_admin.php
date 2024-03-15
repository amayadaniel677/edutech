<?php 

include('../../../model/admin/usuarios/sing_up_admin_model.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $rol=$_POST['rol'];
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
    $foto=$_FILES['foto'];
    
    if ($foto['error'] == UPLOAD_ERR_NO_FILE) {
        // No se ha enviado ninguna foto, utiliza la ruta predeterminada
        $new_user = new sing_up_admin();
        $foto = 'resource/img/photosUsers/defaultPhoto.png';
    } else {
        // Se ha enviado una foto, valida y guarda la foto
        $new_user = new sing_up_admin();
        $foto = $new_user->validarFoto($_FILES['foto'], $documento);
    }

    $msg=$new_user->msg; 

    if(empty($msg)){
        $new_user->validar($rol,$nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia,$confContrasenia,$telefono,$ciudad,$direccion,$foto);
   
    }
   
    
}



class sing_up_admin{
    public $msg=[];
    public function __construct()
    {
        
    }

    public function validar($rol,$nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia,$confContrasenia,$telefono,$ciudad,$direccion,$foto){
        $fecha_hoy=new DateTime();

        $error = false; // Inicializar la bandera de error como falsa

        // Campos vacíos de registro
        if(empty($rol)||empty($nombres)||empty($apellidos)||empty($tipo_documento)||empty($documento)||empty($sexo)||empty($fecha)||empty($correo)||empty($contrasenia)||empty($confContrasenia)||empty($telefono)||empty($ciudad)||empty($direccion)){
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
            $consult=new sing_up_model;
            $consult->insertar($rol,$nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia_encriptada,$telefono,$ciudad,$direccion,$foto); 
        }
    }

    public function validarFoto($foto,$dni){
        // VALIDAR TIPO DE IMAGEN
        $error=false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo =$foto['type'];
    
        if (!in_array($archivo_tipo, $tipos_permitidos)) {
           $this->msg[]='Error: Solo se permiten archivos JPEG, JPG o PNG';
          $error=true;
        }
    
        // Validar el tamaño del archivo (10 MB en este ejemplo)
        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio =$foto['size'];
    
        if ($archivo_tamanio > $tamanio_maximo) {
            $this->msg[]='Error: El tamaño del archivo excede el límite de 10 MB.';
            $error=true;
        }
    
        $carpeta_destino='../resource/img/photosUsers/';
    
        if(!file_exists($carpeta_destino)){
            mkdir($carpeta_destino,0777,true);
        }
    
        $carpeta_destino2='resource/img/photosUsers/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $dni . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino2 . $nombre_archivo;
        $ruta_archivo_nombre_archivo='../' . $ruta_archivo;
    
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_archivo_nombre_archivo)) {
            return($ruta_archivo);
        }
        }
}
include('../../../view/admin/paginas/usuarios/sing_up_admin.php');
?>