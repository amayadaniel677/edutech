<?php 
class descripcionCurso{
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

    public function descripcion_curso($id) {
        $sql = "SELECT s.id AS subject_id, s.name AS subject_name, s.description, s.photo, a.name AS area_name, a.price
                FROM subjects s
                INNER JOIN areas a ON s.areas_id = a.id
                WHERE s.id = $id"; // Filtrar por el id del curso específico
        $result = $this->con->query($sql);
    
        if ($result->num_rows == 1) {
            return $result->fetch_assoc(); // Devuelve los detalles del curso específico
        } else {
            return null; // Manejo de caso donde no se encuentra el curso
        }
    }

    public function mostrarDocentesPorArea($area) {
        $sql = "SELECT P.name AS docente, A.name AS area_name
                FROM people P
                INNER JOIN people_area PA ON P.id = PA.people_id
                INNER JOIN areas A ON PA.areas_id = A.id
                WHERE A.name = '$area'"; // Filtrar los docentes por el nombre del área
        $result = $this->con->query($sql);
    
        $docentes = array();
        while ($row = $result->fetch_assoc()) {
            $docentes[] = $row;
        }
    
        return $docentes;
    }
}




?>