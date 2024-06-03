<?php 
class ver_curso {
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

    public function seleccionar_curso() {
        $sql = "SELECT s.id AS subject_id, s.name AS subject_name, s.description, s.photo, a.name AS area_name
        FROM subjects s
        INNER JOIN areas a ON s.areas_id = a.id
        WHERE s.status = 'active'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            return $datos; // Se ha agregado el retorno de los datos
        } else {
          
            return null; // Se ha agregado el retorno en caso de no haber resultados
        }
    }
    public function seleccionar_curso_inactivo() {
        $sql = "SELECT s.id AS subject_id, s.name AS subject_name, s.description, s.photo, a.name AS area_name
        FROM subjects s
        INNER JOIN areas a ON s.areas_id = a.id
        WHERE s.status = 'inactive'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            return $datos; // Se ha agregado el retorno de los datos
        } else {
         
            return null; // Se ha agregado el retorno en caso de no haber resultados
        }
    }
    
}
