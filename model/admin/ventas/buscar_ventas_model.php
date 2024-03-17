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
            $sql = $sql = "SELECT p.name AS person_name,
            s.name AS subject_name,
            ss.hours AS subject_hours,
            sa.price AS sale_price,
            sa.date AS sale_date
            FROM subject_sale ss
            INNER JOIN sales sa ON ss.sales_id = sa.id
            INNER JOIN subjects s ON ss.subjects_id = s.id
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

    public function venta($dni)
    {
        $id_people = $this->user_exist($dni);
        if ($id_people) {
            $sql = $sql = "SELECT p.name AS person_name,
            s.name AS subject_name,
            ss.hours AS subject_hours,
            sa.price AS sale_price,
            sa.date AS sale_date
            FROM subject_sale ss
            INNER JOIN sales sa ON ss.sales_id = sa.id
            INNER JOIN subjects s ON ss.subjects_id = s.id
            INNER JOIN people p ON sa.people_id = p.id
            WHERE p.id = tu_people_id";

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
