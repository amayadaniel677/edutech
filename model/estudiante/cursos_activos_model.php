<?php 
class cursosActivos{
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


    public function Mostrar_curso() {
        $sql = "SELECT * FROM trolley ";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            return $datos;
        } 
    }
    public function Agregar_horas($horas_adicionales, $name) {
        // Es buena práctica usar parámetros preparados para evitar inyecciones SQL
        $sql = "UPDATE trolley SET hours = hours + ? WHERE name_subject = ?";
        
        // Preparar la consulta
        $stmt = $this->con->prepare($sql);
        
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            // Manejar el error (por ejemplo, lanzar una excepción o mostrar un mensaje)
            // Aquí estamos mostrando un mensaje de error y devolviendo null
            echo "Error al preparar la consulta: " . $this->con->error;
            return null;
        }
        
        // Vincular los parámetros y ejecutar la consulta
        $stmt->bind_param("is", $horas_adicionales, $name);
        $stmt->execute();
        
        // Verificar si la ejecución de la consulta fue exitosa
       
    }
   

   



}