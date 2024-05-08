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
        $sql->bind_param('ss', $email, $dni);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Devuelve el arreglo asociativo con los datos del usuario
        } else {
            return false; // Devuelve false si el usuario no existe
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
    public function generarToken($email)
    {
        // Generar un token único
        $token = bin2hex(random_bytes(16));
    
        // Guardar el token en la base de datos junto con el correo electrónico del usuario y la fecha y hora actual
        $sql = "INSERT INTO recovery_tokens (email, token, created_at) VALUES (?, ?, NOW())";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
    
        return $token;
    }
    
    public function verificarToken($token)
    {
        // Buscar el token en la base de datos
        $sql = "SELECT email FROM recovery_tokens WHERE token=? AND created_at >= NOW() - INTERVAL 1 HOUR";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['email'];
        } else {
            return false;
        }
    }
    

    public function eliminarToken($token)
    {
        // Eliminar el token de la base de datos después de usarlo (por seguridad)
        $sql = "DELETE FROM recovery_tokens WHERE token=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
    }

    public function getCorreoFromDNI($dni)
    {
        $sql = "SELECT email FROM people WHERE dni = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $dni);

        try {
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['email'];
            } else {
                return false;
            }
        } catch (mysqli_sql_exception $e) {
            // Manejar el error de la consulta
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
