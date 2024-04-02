<?php
class eliminar_usuarios_model{

    private $con;
    public function __construct(){
        //$this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }


    public function eliminar_usuario($id){
        $sql="DELETE FROM people WHERE id='$id'";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}

?>