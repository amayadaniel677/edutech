<?php

class eliminar_venta_model{
    private $con;
    public function __construct(){
        //$this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }

    public function eliminar_venta($id_venta){
        $sql="DELETE FROM sales WHERE id='$id_venta'";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>