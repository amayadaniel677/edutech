<?php
class agregar_curso_model
{

    private $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        // $this->con = new mysqli("localhost", "root", "", "edutech");
        $this->con->set_charset("utf8");
    }

    public function insertar_curso($categoria, $nombre, $descripcion, $foto)
    {
        if ($this->user_repeat($nombre)) {
            return false;
        } else {
            $id_area = $this->id_area($categoria);
            if ($id_area) {
                $sql = "INSERT INTO subjects (`name`,`photo`,`description`,`area_id`) values('$nombre','$foto','$descripcion','$id_area')";
                $result = $this->con->query($sql);
                if ($result->num_rows > 0) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    public function id_area($nombre)
    {
        $sql = "SELECT * FROM area WHERE name='$nombre'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_area = $row['id'];
            return $id_area;
        } else {
            return false;
        }
    }

    public function traer_areas()
    {
        $sql = "SELECT `name` FROM areas";
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

    public function user_repeat($nombre)
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
