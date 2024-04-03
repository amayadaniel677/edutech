<?php
class areas_subjects_Consult {

// Conexión a BD
private $con;

// Constructor de la BD
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

// Método para autenticar un usuario y obtener su ID


// Método para obtener las áreas y materias de un docente
public function getAreasAndSubjectsFromSession() {
    // Iniciar sesión si no está iniciada
    if (!isset($_SESSION['id_session'])) {
        // Manejar el caso en el que el ID del docente no está en la sesión
        return array();
    }
    $docente_id = $_SESSION['id_session'];

    $query = "SELECT a.id AS area_id, a.name AS area_nombre, s.name AS materia_nombre,
              pa.people_id
              FROM areas a 
              INNER JOIN subjects s ON a.id = s.areas_id 
              INNER JOIN people_area pa ON a.id = pa.areas_id 
              INNER JOIN people p ON pa.people_id = p.id 
              WHERE p.id = ?";
             $stmt = $this->con->prepare($query);
    $stmt->bind_param("i", $docente_id);
 
    
    $stmt->execute();
    
    $result = $stmt->get_result();

    $areas_materias = array();

    while ($row = $result->fetch_assoc()) {
        $areas_materias[] = $row; 
    }

    return $areas_materias;
}

}
