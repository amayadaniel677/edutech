<?php

class eliminar_venta_model
{
    private $con;
    public function __construct()
    {
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

    public function eliminar_venta($id_venta)
    {
        $sql = "UPDATE sales SET status='inactive' WHERE id='$id_venta'";
        $result = $this->con->query($sql);
        if ($result) {
            $restar = $this->restarHorasCompradas($id_venta);
            return true;
        } else {
            return false;
        }
    }
    public function restarHorasCompradas($id_venta)
{
    $sql = "SELECT id,remaining_units_id,total_quantity FROM subject_sale WHERE sales_id='$id_venta'";
    $result = $this->con->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $remaining_units_id = $row['remaining_units_id'];
            $total_quantity = $row['total_quantity'];

            // Obtener el valor actual de total_units
            $sql2 = "SELECT total_units FROM remaining_units WHERE id='$remaining_units_id'";
            $result2 = $this->con->query($sql2);
            if ($result2 && $row2 = $result2->fetch_assoc()) {
                $current_total_units = $row2['total_units'];

                // Restar las unidades compradas, asegurándose de que no se quede un valor negativo
                $new_total_units = $current_total_units - $total_quantity;
                if ($new_total_units < 0) {
                    $new_total_units = 0; // Establece a 0 si el resultado sería negativo
                }

                // Actualizar el valor de total_units con el nuevo valor calculado
                $update_sql = "UPDATE remaining_units SET total_units=$new_total_units WHERE id='$remaining_units_id'";
                $update_result = $this->con->query($update_sql);

                // Si todo salió bien, actualizar el estado a 'inactive'
                $sql3 = "UPDATE balances SET status='inactive' WHERE sales_id='$id_venta'";
                $result3 = $this->con->query($sql3);
            }
        }

        return true;
    } else {
        // Manejar el error si la consulta inicial falla
        return false;
    }
}

}
