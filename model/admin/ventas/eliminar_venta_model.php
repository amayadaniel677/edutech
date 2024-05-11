<?php

class eliminar_venta_model{
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

    public function eliminar_venta($id_venta){
        $sql="UPDATE sales SET status='inactive' WHERE id='$id_venta'";
        $result=$this->con->query($sql);
        if($result){
            $restar=$this->restarHorasCompradas($id_venta);
            return true;
        }else{
            return false;
        }
    }
    public function restarHorasCompradas($id_venta){
        $sql="SELECT id,remaining_units_id,total_quantity FROM subject_sale WHERE sales_id='$id_venta'";
        $result=$this->con->query($sql);
        if($result){
            while($row=$result->fetch_assoc()){
                $remaining_units_id=$row['remaining_units_id'];
                $total_quantity=$row['total_quantity'];
                // restar horas de remaining_units
                $sql2="UPDATE remaining_units SET total_units=total_units-'$total_quantity' WHERE id='$remaining_units_id'";
                $result2=$this->con->query($sql2);
                // echo "horas restadas:".$total_quantity." del detalle:".$row['id'];
            }

            return true;
        }
    }
}
?>