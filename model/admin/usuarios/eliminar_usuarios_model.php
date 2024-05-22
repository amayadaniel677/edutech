<?php
class eliminar_usuarios_model{

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


    public function eliminar_usuario($id,$accion){
        $sql="update people set status='$accion' where id='$id'";
        $result=$this->con->query($sql);
        if($result){
            $this->reset_remaining_units($id);
            return true;
        }else{
            return false;
        }
    }
    public function reset_remaining_units($people_id){
        $sql="UPDATE remaining_units
        INNER JOIN subject_sale ON remaining_units.id = subject_sale.remaining_units_id
        INNER JOIN sales ON subject_sale.sales_id = sales.id
        INNER JOIN people ON sales.people_id = people.id
        SET remaining_units.total_units = 0, remaining_units.attended_units = 0
        WHERE people.id = '$people_id' "; 
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
         
    }
}

?>