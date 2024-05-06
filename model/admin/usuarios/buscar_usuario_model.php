<?php
class buscar_usuario_model{
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

    public function traer_usuarios($tipo_usuario){
        if($tipo_usuario=='todos'){
            // entro al modelo traer todos
           
            $sql="SELECT * FROM people WHERE rol !='administrador' AND status='active'";
        }else{
            // entro al modelo traer por tipo de usuario
           
            $sql="SELECT * FROM people WHERE rol='$tipo_usuario'";
        }

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

    public function buscar_usuario($dni){
        $sql="SELECT * FROM people WHERE dni='$dni'";
        $result=$this->con->query($sql);
        if ($result->num_rows > 0) {
            $result_array = [];
            while ($row = $result->fetch_assoc()) {
                $result_array[] = $row;
            }

            if($result_array[0]['rol']=='administrador'){
                return false;
            }else{
                return $result_array;
            }
        } else {
            return false;
        }
    }
    // logica de agregar horas pagadas al docente
    
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
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
    public function traer_horas($id_docente){
        $sql="SELECT total_hours FROM payments WHERE people_id='$id_docente'";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;
        }else{
            return false;
        }
    }

    public function traer_cursos_activos($people_id){
        //traerlos de la tabla remaining_units
        $sql="SELECT 
        RU.id,
        RU.total_units,
        RU.attended_units,
        SS.quantity_type,
        SS.modality,
        subjects.name AS subject_name
    FROM 
        REMAINING_UNITS AS RU
    JOIN 
        SUBJECT_SALE AS SS ON RU.id = SS.remaining_units_id
    JOIN 
        subjects ON SS.subjects_id = subjects.id
    JOIN
        SALES AS S ON SS.sales_id = S.id
    JOIN 
        PEOPLE AS P ON S.people_id = P.id
    WHERE 
        P.id ='$people_id'
    GROUP BY 
        RU.id, SS.subjects_id, SS.quantity_type, SS.modality;
    ";
    $result=$this->con->query($sql);
    if($result->num_rows>0){
        $result_array = [];
        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row;
        }
        return $result_array;
    }
    else{
        return false;
    }
    }
    
}
?>