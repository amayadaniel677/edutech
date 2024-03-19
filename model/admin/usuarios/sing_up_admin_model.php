<?php
class sing_up_model
{
    private $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        // $this->con = new mysqli("localhost", "root", "", "edutech");
        $this->con->set_charset("utf8");
    }

    public function insertar($rol,$nombres, $apellidos, $tipo_documento, $documento, $sexo, $fecha, $correo, $contrasenia_encriptada, $telefono, $ciudad, $direccion, $foto)
    {
        if ($this->user_repeat($documento, $this->con)) {
            return 'Error! el usuario ya está registrado';
        } else {
            $fecha_formateada = $fecha->format('Y-m-d');
            $sqlInsert = "INSERT INTO people (`name`,`lastname`,`dni_type`,`dni`,`birthdate`,`email`,`password`,`phone`,`city`,`address`,`sex`,`rol`,`photo`) VALUES ('$nombres','$apellidos','$tipo_documento','$documento','$fecha_formateada','$correo','$contrasenia_encriptada','$telefono','$ciudad','$direccion','$sexo','$rol','$foto')";
            $result = $this->con->query($sqlInsert);
            if ($result == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function user_repeat($documento, $con)
    {
        $sql = "select * from people where dni='$documento'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
