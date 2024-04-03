<?php
class actualizar_user{
    // INICIO DE LOS METODOS PARA REGISTRARSE
    private $con;
    public function __construct() {
        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    
        try {
            $this->con = new mysqli("localhost", "edutech", "edutechadso2024", "edutech");
        } catch (mysqli_sql_exception $e) {
            // Intenta conectar con la segunda opción si la primera falla
            try {
                $this->con = new mysqli("localhost", "root", "", "edutech");
            } catch (mysqli_sql_exception $e) {
                // Maneja el error de conexión aquí
                echo "Error al conectar: " . $e->getMessage();
                // Considera lanzar una excepción o manejar el error de otra manera
            }
        }
    
        $this->con->set_charset("utf8");
    }
    public function actualizar_datos($documento,$nombres,$apellidos,$tipo_documento,$fecha,$correo,$telefono,$ciudad,$direccion,$foto_actual,$foto_vieja,$foto_file){
   
        $fecha_formateada = $fecha->format('Y-m-d');
        
        $sqlUpdate="UPDATE people SET 
        `name` = '$nombres',
        lastname = '$apellidos',
        city = '$ciudad',
        phone = '$telefono',
        email = '$correo',
        birthdate = '$fecha_formateada',
        `address` = '$direccion',
        dni_type = '$tipo_documento',
        photo = '$foto_actual'
        WHERE dni = $documento "
        ;  
        
        $result=$this->con->query($sqlUpdate);
        if($result==1){
            session_start();
            $_SESSION['name_session']=$nombres;
            $_SESSION['lastname_session']=$apellidos;
            $_SESSION['dni_type_session']=$tipo_documento;
            $_SESSION['phone_session']=$telefono;
            $_SESSION['city_session']=$ciudad;
            $_SESSION['birthdate_session']=$fecha_formateada;
            $_SESSION['address_session']=$direccion;
            $_SESSION['email_session']=$correo;
            $_SESSION['photo_session']=$foto_actual;
            $funciones_controlador= new obtener_datos();
            $funciones_controlador->mover_borrar_foto($documento,$foto_actual,$foto_vieja,$foto_file);
            return true; 
           
            exit();
        }else{
            return false;
        }
     
     }
     public function actualizar_contrasenia($dni,$contrasenia_encriptada){
        $sql="UPDATE people SET `password`='$contrasenia_encriptada' WHERE dni='$dni'";
        $result = $this->con->query($sql);
        if($result){
            session_start();
            $_SESSION['password_session']=$contrasenia_encriptada;
            return 1;
        }else{
            return 0;
        }
     
    }


}

 

?>
