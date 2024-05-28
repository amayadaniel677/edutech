<?php
class pagos_pendientes_model
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

    public function traer_pagos()
    {
        $sql = "SELECT payments.*, people.name, people.lastname
        FROM payments
        INNER JOIN people ON payments.people_id = people.id
        WHERE payments.total_hours>0";
        $result = $this->con->query($sql);
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

    public function pagos_exist($id_pago)
    {
        $sql = "SELECT total_hours FROM payments WHERE id='$id_pago'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $row= $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    public function hacer_pago($total_hours, $price_hour, $total_price, $payments_id)
    {
        $restar = $this->restar_horas($payments_id, $total_hours);
        if ($restar) {
            $date = date("Y-m-d");
            $sql = "INSERT INTO payment_history (`date`,`total_hours`,`price_hour`,`total_price`,`payments_id`) VALUES ('$date','$total_hours','$price_hour','$total_price','$payments_id')";
            $result=$this->con->query($sql);
            if($result){
                $this->actualizar_fecha($date, $payments_id);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function restar_horas($payments_id, $total_hours)
    {
        $sql = "UPDATE payments SET total_hours=total_hours-$total_hours WHERE id='$payments_id'";
        $result = $this->con->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function actualizar_fecha($date, $id){
        $sql = "UPDATE payments SET last_pay='$date' WHERE id='$id'";
        $result = $this->con->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
