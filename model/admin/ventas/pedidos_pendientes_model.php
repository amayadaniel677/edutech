<?php
class pedidos_pendientes_model
{
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

    public function obtener_pedidos()
    {
        $sql = 'SELECT o.price, o.date,o.id, p.name
        FROM `order` AS o
        INNER JOIN people AS p ON o.people_id = p.id;';
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $pedidos = array();
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
            return $pedidos;
        } else {
            return false;
        }
    }


    public function eliminar_pedidos_orden($id)
    {
        $sql = 'DELETE FROM `order` WHERE id = ' . $id;
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
