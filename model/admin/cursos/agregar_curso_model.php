<?php
class agregar_curso_model
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

    public function insertar_curso($categoria, $nombre, $descripcion, $foto, $temas)
    {
        if ($this->subject_repeat($nombre)) {
            return "Ya existe un curso con ese nombre, active este curso en el catalogo si desea volver a publicarlo";
        } else {
            $id_area = $categoria;
            echo "id_area: " . $id_area;
            if ($id_area) {
                $sql = "INSERT INTO subjects (`name`,`photo`,`description`,`areas_id`,`topics`) values('$nombre','$foto','$descripcion','$id_area','$temas')";
                $result = $this->con->query($sql);
                if ($result) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    // public function id_area($nombre)
    // {
    //     $sql = "SELECT * FROM area WHERE name='$nombre'";
    //     $result = $this->con->query($sql);
    //     if ($result->num_rows > 0) {
    //         $row = $result->fetch_assoc();
    //         $id_area = $row['id'];
    //         return $id_area;
    //     } else {
    //         return false;
    //     }
    // }

    public function traer_areas()
    {
        $sql = "SELECT `name`,`id` FROM areas WHERE status='active'";
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

    public function subject_repeat($nombre)
    {
        $sql = "SELECT * FROM subjects WHERE name='$nombre'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
