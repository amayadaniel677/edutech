<?php

class vincular_docente_model
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

    public function traer_docentes()
    {
        $sql = "SELECT * FROM people WHERE `rol`='docente' and `status`='active'";
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

    public function vincular_docente($id_area,$id_docente){
        $sql="INSERT INTO people_area (areas_id,people_id) values ('$id_area','$id_docente')";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function traer_docentes_vinculados($id_area){
        $sql = "SELECT people.`name`, people.lastname, areas.`name` AS area_name,people_area.id, people_area.people_id, people_area.areas_id
                FROM people_area
                INNER JOIN people ON people_area.people_id = people.id
                INNER JOIN areas ON people_area.areas_id = areas.id
                WHERE areas_id = '$id_area' and people_area.status = 'active'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0){
            $result_array = [];
            while($row = $result->fetch_assoc()){
                $result_array[] = $row;
            }
            return $result_array;
        } else {
            return false;
        }
    }
    // crear funcion desvincular un docente cambiar estado a inactive
    public function inactivar_docente($id_docente){
        $sql = "UPDATE people_area SET status = 'inactive' WHERE id = '$id_docente'";
        $result = $this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
