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
        $sql="SELECT * FROM `detail_order` WHERE order_id = '$id'";
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
}

?>