<?php
class pagos_pendientes_model{

    private $con;
    public function __construct(){
        //$this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }

    
}

?>