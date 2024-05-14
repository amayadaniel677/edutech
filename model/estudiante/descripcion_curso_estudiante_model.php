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
        $sql = "SELECT s.id AS subject_id, s.name AS subject_name, s.description, s.photo, s.topics,a.id, a.name AS area_name
                FROM subjects s
                INNER JOIN areas a ON s.areas_id = a.id
                WHERE s.id = $id"; // Filtrar por el id del curso específico
        $result = $this->con->query($sql);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
    
            // Dividir los temas en un array
            $topics_array = explode(',', $row['topics']);
    
            // Agregar el array de temas a la fila
            $row['topics_array'] = $topics_array;
    
            return $row; // Devuelve los detalles del curso específico con el array de temas
        } else {
            return null; // Manejo de caso donde no se encuentra el curso
        }
    }
    

    public function mostrarDocentesPorArea($area) {
        $sql = "SELECT P.lastname, P.name AS docente, A.name AS area_name
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
    public function seleccionar_curso($area_id) {
        $sql = "SELECT s.id AS subject_id, s.name AS subject_name, s.description, s.photo, a.name AS area_name
                FROM subjects s
                INNER JOIN areas a ON s.areas_id = a.id
                WHERE s.areas_id = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $area_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            return $datos;
        } else {
            return null;
        }
    }
    public function mostrar_precio() {
        $sql = "SELECT id,name,price_hour_student AS p_student,price_class_student AS p_class FROM modalities";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            return $datos;
        } else {
            return null;
        }
    }

    public function traer_cursos($id){
        $sql="SELECT * FROM subjects WHERE id='$id' AND `status`='active'";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return $row;
        }else{
            return false;
        }
    }

    public function eliminar_curso($id){
        $sql="UPDATE subjects SET status='inactive' WHERE id='$id'";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    
}




?>