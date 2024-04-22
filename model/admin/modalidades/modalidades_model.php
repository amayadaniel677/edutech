<?php
class buscar_modalidad_model{
    private $con;
    public function __construct() {
        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    
        try {
            $this->con = new mysqli("localhost", "edutech", "edutechadso2024", "edutech");
        } catch (mysqli_sql_exception $e) {
            try {
                $this->con = new mysqli("localhost", "root", "", "edutech");
            } catch (mysqli_sql_exception $e) {
                echo "Error al conectar: " . $e->getMessage();
            }
        }
        $this->con->set_charset("utf8");
    }

    public function traer_modalidad(){

        $sql = "SELECT * FROM modalities WHERE status = 'active'";
    
        $result = $this -> con ->query($sql);
    
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
    

    public function actualizar_modalidad($id, $price_hour_student, $price_teacher, $price_class_student){

        $sql = "UPDATE modalities SET price_hour_student = ?, price_teacher = ?, price_class_student = ? WHERE id = ?";

        $result = $this->con->prepare($sql);

        $result->bind_param("dddi", $price_hour_student, $price_teacher, $price_class_student, $id);
        return $result->execute();
    }

    public function desactivar_modalidad($id){

        $sql = "UPDATE modalities SET status = 'inactive' WHERE id = ?";
    
        $result = $this->con->prepare($sql);
    
        $result->bind_param("i", $id);
     
        if ($result->execute()) {
            $_SESSION['modalidades'] = $this->traer_modalidad();
            return true;
        } else {
            return false;
        }
    }
    

    public function traer_datos_editar($id){
        $sql = "SELECT * FROM modalities WHERE id = $id";
    
        $result = $this->con->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }
}

?>