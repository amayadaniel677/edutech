<?php
class buscar_area_model
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
    }

    public function traer_areas()
    {
        $sql = "SELECT * FROM areas";
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
    // traer area seleccionada
    public function traer_area($id_area)
    {
        $sql = "SELECT * FROM areas WHERE id = '$id_area'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $result_array = $result->fetch_assoc();
            return $result_array;
        } else {
            return false;
        }
    }
    public function traer_vinculados($id_area)
    {
        $sql = "SELECT people_area.id AS people_area_id, people.name AS people_name, areas.name AS area_name,
        areas.price AS area_price, areas.id AS area_id, areas.status AS area_status
        FROM people_area
        INNER JOIN people ON people_area.people_id = people.id
        INNER JOIN areas ON people_area.areas_id = areas.id
        WHERE areas.id = '$id_area' and people_area.status = 'active'";
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

    public function editarArea($name, $id,$status)
    {
        $sql = "UPDATE areas SET name = '$name', `status` = '$status' WHERE id = '$id'";
        $result = $this->con->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function activarArea($id)
    {
        $sql = "UPDATE areas SET status = 'active' WHERE id = '$id'";
        $result = $this->con->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function desactivarArea($id)
    {
        $sql = "UPDATE areas SET status = 'inactive' WHERE id = '$id'";
        $result = $this->con->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function crear_area($name)
    {
        $otra_area=$this->area_exist($name);
        if($otra_area){
            return false;
        }else{
            $price = 0;
            $sql = "INSERT INTO areas (name, price) VALUES ('$name', '$price')";
            $result = $this->con->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            } 
        }
    }

    public function area_exist($name)
    {   
        $sql = "SELECT * FROM areas WHERE name = '$name'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
