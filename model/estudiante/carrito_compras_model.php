<?php

class Carrito_compras{
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

    public function insertar_curso($id_people, $price, $hours, $subject_id){ 
        // Verificar si el curso ya está en el carrito
        $sql_check = "SELECT id FROM trolley WHERE subjects_id = ?";
        $stmt_check = $this->con->prepare($sql_check);
        $stmt_check->bind_param('i', $subject_id);
        $stmt_check->execute();
        $stmt_check->store_result();
        
        if ($stmt_check->num_rows > 0) {
            
            $_SESSION['error_message'] = "    Este  curso  ya está en el carrito.";
           
            return false; // No se inserta el curso
        }
    
        // Si el curso no existe en el carrito, proceder a insertarlo
        $sql_insert = "INSERT INTO trolley (price, hours,people_id,subjects_id) VALUES (?, ?, ?,?)";
        $stmt_insert = $this->con->prepare($sql_insert);
        $stmt_insert->bind_param('iiii',  $price, $hours, $id_people,$subject_id);
        $stmt_insert->execute();
        
        // Devolver true para indicar que el curso se insertó correctamente
        return true;
    }
    
    public function Mostrar_curso() {
        $sql = "SELECT t.id, s.name, t.price, t.hours, t.subjects_id, t.people_id
        FROM trolley t
        INNER JOIN subjects s ON t.subjects_id = s.id";
        
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            return $datos;
        } else {
            echo "0 resultados";
            return null;
        }
    }
    public function Eliminar_curso ($id ){
        
        $sql = "DELETE FROM trolley WHERE id = ?";
    
        // Preparar la consulta
        $stmt = $this->con->prepare($sql);
        
        // Vincular el parámetro
        $stmt->bind_param('i', $id);
        
        // Ejecutar la consulta
        $stmt->execute();
        
    }
    public function vaciar_carrito() {
        // Verificar si hay cursos en la base de datos
        $sql = "SELECT COUNT(id) as total_cursos FROM trolley";
        $result = $this->con->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $total_cursos = $row['total_cursos'];
            
            if ($total_cursos > 0) {
                // Si hay cursos en la base de datos, vaciar el carrito
                $sql_delete = "DELETE FROM trolley";
                $this->con->query($sql_delete);
                $_SESSION['carrito'] = [];
                $_SESSION['total_cursos'] = 0;
            } else {
                $_SESSION['error_message'] = "El carrito ya está vacío.";
            }
        } else {
            $_SESSION['error_message'] = "Error al verificar el estado del carrito.";
        }
    }
    
    

}