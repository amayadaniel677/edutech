<?php
class saldos_pendientes_model
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
    public function traer_abonos_pendientes()
    {
        $sql = "SELECT 
        sales.price AS valor_venta, 
        sales.date AS fecha_venta, 
        sales.id AS id_venta, 
        people.name AS person_name, 
        people.lastname AS person_lastname, 
        balances.total_paid AS valor_abonado,
        balances.last_payment AS ultimo_abono 
    FROM balances
    INNER JOIN sales ON balances.sales_id = sales.id
    INNER JOIN people ON sales.people_id = people.id WHERE sales.status='active' and balances.status='active' AND balances.total_paid < sales.price ORDER BY sales.date DESC ";
        $resultado = $this->con->query($sql);
        $abonos_pendientes = [];
        while ($fila = $resultado->fetch_assoc()) {
            $abonos_pendientes[] = $fila;
        }
        return $abonos_pendientes;
    }
}
