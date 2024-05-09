<?php

class pagos_historial_model
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

    public function traer_historial_pagos()
    {
        $sql = "SELECT 
        ph.date,
        ph.total_hours,
        ph.price_hour,
        ph.total_price,
        pe.name,
        pe.lastname
        FROM 
            payment_history AS ph
        JOIN 
            payments AS p ON ph.payments_id = p.id
        JOIN 
            people AS pe ON p.people_id = pe.id
        WHERE 
            pe.status = 'active'";
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
