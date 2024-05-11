<?php
class buscar_venta_model
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

    public function user_exist($dni)
    {
        $sql = "SELECT * FROM people WHERE dni='$dni'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return false;
        }
    }

    public function ventas()
    {
        $sql = $sql = "SELECT
            p.dni AS person_dni,
            p.name AS person_name,
            p.lastname AS person_lastname,
            sa.price AS sale_price,
            sa.date AS sale_date,
            sa.id AS sale_id
            FROM sales sa
            INNER JOIN people p ON sa.people_id = p.id  WHERE sa.status='active' ORDER BY sa.date DESC ";

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

    public function ventas_filtradas($dni1, $from_date, $to_date)
    {

        // $id_people = $this->user_exist($dni1);
        // if ($id_people) {
        // validar si enviaron las fechas o solo el dni
       
        if ($from_date != "" && $to_date != "" && $dni1 != "") {
            $sql = "SELECT
                p.dni  AS person_dni,
                p.name  AS person_name,
                sa.id AS sale_id,
                sa.price AS sale_price,
                sa.date AS sale_date
                FROM sales sa
                INNER JOIN people p ON sa.people_id = p.id
                WHERE p.dni = '$dni1' AND sa.date BETWEEN '$from_date' AND '$to_date' ORDER BY sa.date DESC";
        } elseif ($from_date != "" && $to_date != "" && $dni1 == "") {
       
            $sql = "SELECT
                p.dni  AS person_dni,
                p.name  AS person_name,
                sa.id AS sale_id,
                sa.price AS sale_price,
                sa.date AS sale_date
                FROM sales sa
                INNER JOIN people p ON sa.people_id = p.id
                WHERE sa.date BETWEEN '$from_date' AND '$to_date'  ORDER BY sa.date DESC";
        }elseif ($from_date == "" && $to_date == "" && $dni1 != "") {
            $sql = "SELECT
                p.dni  AS person_dni,
                p.name  AS person_name,
                sa.id AS sale_id,
                sa.price AS sale_price,
                sa.date AS sale_date
                FROM sales sa
                INNER JOIN people p ON sa.people_id = p.id
                WHERE p.dni = '$dni1'  ORDER BY sa.date DESC";
        }
       

        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            $result_array = [];
            while ($row = $result->fetch_assoc()) {
                $result_array[] = $row;
            }
            return $result_array;
        } else {
            // no devolvio la cantidad de filas esperadas
           
            return false;
        }
    }
    

}
