<?php
class user_consult{
    // INICIO DE LOS METODOS PARA REGISTRARSE
    private $con;
    public function __construct(){
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }
    public function insertar($nombres,$apellidos,$tipo_documento,$documento,$sexo,$fecha,$correo,$contrasenia_encriptada,$telefono,$ciudad,$direccion){
     if($this->user_repeat($documento,$this->con)){
        return 'Error! el usuario ya está registrado';
     }else{
        $fecha_formateada = $fecha->format('Y-m-d');
        $sqlInsert="INSERT INTO users (`name`,last_name,document_type,dni,birthdate,email,`password`,phone,city,`address`,sex,rol) VALUES ('$nombres','$apellidos','$tipo_documento','$documento','$fecha_formateada','$correo','$contrasenia_encriptada','$telefono','$ciudad','$direccion','$sexo','estudiante')";   
        $result=$this->con->query($sqlInsert);
        if($result==1){
            $mensaje='¡Registro exitoso! Por favor inicia sesión con tus credenciales.';
            header('location:login_controller.php?mensaje='.urlencode($mensaje));
            exit();
        }else{
            return 'Error al registrar el usuario';
        }
     }
     }

    public function user_repeat($documento,$con){
        $sql="select * from users where dni='$documento'";
        $result=mysqli_query($con,$sql);
        if($result->num_rows>0){
            return true;
        }else{
            return false;
        }
    }
    //INICIO DE LOS METODOS PARA INICIAR SESIÓN
    public function user_exist($dni,$contrasenia){
        $sql_select="SELECT * FROM users WHERE dni='$dni'";
        $result=$this->con->query($sql_select);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            $contrasenia_bd=$row['password'];
            $rol=$row['rol'];
            if(password_verify($contrasenia,$contrasenia_bd)){
                return true;
            }
        }
        

    }

    public function obtener_datos($dni){
        $sql="SELECT * FROM people WHERE dni = $dni";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;
        }
        
    }

}

 

?>