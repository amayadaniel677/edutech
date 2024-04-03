<?php
class editar_usuario_model{
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

    public function traer_usuario($id){
        $sql=("SELECT * FROM people WHERE id='$id'");
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;
        }
    }

    public function editar_informacion($id,$nombre, $apellido, $ciudad, $direccion, $fecha_nacimiento, $sexo, $correo, $tipo_documento){
        $sql="UPDATE people SET name = '$nombre', lastname = '$apellido', city = '$ciudad', address = '$direccion', birthdate = '$fecha_nacimiento', sex = '$sexo', email = '$correo', dni_type = '$tipo_documento' WHERE id = '$id' ";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }       
    }

}
?>