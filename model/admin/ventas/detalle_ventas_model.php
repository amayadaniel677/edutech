<?php
class detalle_ventas_model{

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

    public function buscar_usuario($id_venta){
        $sql="SELECT people.*
        FROM sales
        INNER JOIN people ON sales.people_id = people.id
        WHERE sales.id = '$id_venta'";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;
        }else{
            return false;
        }
    }

    public function detalle_ventas($id_venta){
        $sql="SELECT subjects.name, subject_sale.id, subject_sale.price, subject_sale.total_hours, subject_sale.remaining_hours
        FROM sales
        INNER JOIN subject_sale ON sales.id = subject_sale.sales_id
        INNER JOIN subjects ON subject_sale.subjects_id = subjects.id
        WHERE sales.id = '$id_venta'";
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
}
?>