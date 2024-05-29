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
        balances.last_payment AS ultimo_abono,
        balances.id AS id_saldo
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
    public function abonar_saldo($saldo_id, $valor_abono)
    {
        $date=date('Y-m-d');
        // consultar cuanto falta por pagar
        $sql = "SELECT sales.price AS valor_venta, balances.total_paid AS valor_abonado FROM balances 
        INNER JOIN sales ON balances.sales_id = sales.id 
        WHERE balances.id = '$saldo_id'";
        $resultado = $this->con->query($sql);
        $fila = $resultado->fetch_assoc();
        $valor_venta = $fila['valor_venta'];
        $valor_abonado = $fila['valor_abonado'];
        $saldo_restante = $valor_venta - $valor_abonado;
        // si el abono es mayor al saldo restante, no se puede registrar el abono
        if ($valor_abono > $saldo_restante) {
            return "Error: el valor abonado $valor_abono es mayor al saldo restante $saldo_restante";
        }
        else{
            $sql = "UPDATE balances SET total_paid = total_paid + '$valor_abono', last_payment = '$date' WHERE id = '$saldo_id'";
            $result=$this->con->query($sql);
           
            if($result){
                $sql = "INSERT INTO balance_detail(`date`, amound_paid, balances_id) VALUES ('$date', '$valor_abono', $saldo_id)";
                $result2=$this->con->query($sql);
                if($result2){
                    return true;
                }
                else{
                    return false;
                }

            }

        }
        
        $this->con->query($sql);
    }
}
