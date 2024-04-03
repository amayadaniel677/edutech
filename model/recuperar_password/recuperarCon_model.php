<?php

class recuperar_con
{

    private $con;

    public function __construct()
    {
        $this->con = new mysqli("localhost", "edutech", "edutechadso2024", "edutech");
        $this->con->set_charset("utf8");
    }

    public function emailExiste($email, $dni)
    {
        $sql = $this->con->prepare("SELECT id FROM people WHERE email=? AND dni=?");
        $sql->bind_param('is', $email, $dni);
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_assoc(); // Retorna el resultado como un array asociativo
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
