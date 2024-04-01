<?php
class buscar_venta_model
{
    private $con;
    public function __construct()
    {
        //$this->con = new mysqli("localhost", "edutech", "edutechadso2024", "edutech");
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }

    public function user_exist($dni)
    {
        $sql = "SELECT * FROM people WHERE dni='$dni'";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return false;
        }
    }

    public function ventas()
    {
            $sql = $sql = "SELECT
            p.dni AS person_dni,
            p.name AS person_name,
            sa.price AS sale_price,
            sa.date AS sale_date,
            sa.id AS sale_id
            FROM sales sa
            INNER JOIN people p ON sa.people_id = p.id";

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

    public function venta($dni1)
    {
     
        $id_people = $this->user_exist($dni1);
        if ($id_people) {
         $sql = "SELECT
            p.dni  AS person_dni,
            p.name  AS person_name,
            sa.id AS sale_id,
            sa.price AS sale_price,
            sa.date AS sale_date
            FROM sales sa
            INNER JOIN people p ON sa.people_id = p.id
            WHERE p.dni = '$dni1'";

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
        }else{
            return false; 
        }
    }
}
