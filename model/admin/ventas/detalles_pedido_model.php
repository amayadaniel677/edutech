<?php
class detalles_pedido_model{

    private $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        // $this->con = new mysqli("localhost", "root", "", "edutech");
        $this->con->set_charset("utf8");
    }

    public function obtener_detalle_pedidos($id){
        $sql="SELECT 
        detail_order.hours, 
        detail_order.price, 
        detail_order.subjects_id, 
        `subjects`.`name` AS subjects_name, 
        `order`.people_id, 
        `order`.id AS order_id, 
        `order`.`date`,
        `people`.`name` AS people_name, 
        `people`.`lastname` AS people_lastname, 
        people.email AS people_email, 
        people.dni AS people_dni, 
        people.city AS people_city, 
        people.phone AS people_phone
    FROM 
        detail_order 
    INNER JOIN 
        subjects ON detail_order.subjects_id = subjects.id 
    INNER JOIN 
        `order` ON detail_order.order_id = `order`.`id`
    INNER JOIN 
        people ON `order`.`people_id` = people.id 
    WHERE 
        detail_order.order_id = '$id';";
        $result=$this->con->query($sql);
        if ($result->num_rows > 0) {
            $detalle = array();
            while ($row = $result->fetch_assoc()) {
                $detalle[] = $row;
            }
            return $detalle;
        } else {
            return "bobos hptas modelo";
        }
    }

    public function registrar_venta_completa($precio,$people_id){
        //    si existe el usuario
            $fecha = date("Y-m-d");
            $sql="INSERT INTO sales(price,`date`,people_id) VALUES('$precio','$fecha','$people_id')";
            $result=$this->con->query($sql);
            if($result){
                // Obtener el ID de la última inserción
                $lastInsertedId = $this->con->insert_id;
                return $lastInsertedId;
            }
            else{
                return false;
            }
        }
    
        public function registrar_detalles_venta($precio,$total_hours,$subjects_id,$sales_id){
            // si recibe parametros bien
           $sql="INSERT INTO subject_sale(price,total_hours,subjects_id,remaining_hours,sales_id) VALUES('$precio','$total_hours','$subjects_id','$total_hours','$sales_id')";
            $result=$this->con->query($sql);
            if($result==1){
                return true;
            }else{
                return false;
            }
            
      }
      public function eliminar_pedido($idPedido){
        $sql="DELETE FROM `order` WHERE id='$idPedido'";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
      }
        }
        


?>