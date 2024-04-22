<?php

class recuperar_con
{

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
    public function emailExiste($email, $dni)
    {
        $sql = $this->con->prepare("SELECT id, email, dni FROM people WHERE email=? AND dni=?");
        $sql->bind_param('si', $email, $dni);
        $sql->execute();
        $result = $sql->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Devuelve el arreglo asociativo con los datos del usuario
        } else {
            return false;
             // Devuelve false si el usuario no existe
        }
    }
    


    public function modificarContrasenia($dni, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE people SET password=? WHERE dni=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $dni);
        $result = $stmt->execute();
        
        return $result;
        // También puedes almacenar la fecha y hora de creación del token si es necesario
    }
}
