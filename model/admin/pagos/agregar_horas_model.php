<?php
class agregar_horas_model{
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


    public function traer_docentes(){
        $sql="SELECT id,`name` FROM people WHERE rol='docente' AND `status`='active' ";
        $result=$this->con->query($sql);
        if ($result->num_rows > 0) {
            $result_array = [];
            while ($row = $result->fetch_assoc()) {
                $result_array[] = $row;
            }
            return $result_array;
        } else {
            return false;
        }
    }

    public function payment_exist($id_docente){
        $sql="SELECT * FROM payments WHERE people_id='$id_docente'";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

    public function realizar_pago($id_docente,$horas){
        if($this->payment_exist($id_docente)){
            $sql="UPDATE payments
            SET total_hours = total_hours + $horas
            WHERE people_id = $id_docente";
            $result=$this->con->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            $sql="INSERT INTO payments (`total_hours`,`people_id`) VALUES ('$horas','$id_docente')";
            $result=$this->con->query($sql);
            if($result->num_rows>0){
                return true;
            }else{
                return false;
            }
        }
    }
}
?>