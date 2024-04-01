<?php
class buscar_usuario_model{
    private $con;
    public function __construct(){
        //$this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }

    public function traer_usuarios(){
        $sql="SELECT * FROM people WHERE rol !='administrador'";
        $result=$this->con->query($sql);
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

    public function buscar_usuario($dni){
        $sql="SELECT * FROM people WHERE dni='$dni'";
        $result=$this->con->query($sql);
        if ($result->num_rows > 0) {
            $result_array = [];
            while ($row = $result->fetch_assoc()) {
                $result_array[] = $row;
            }

            if($result_array[0]['rol']=='administrador'){
                return false;
            }else{
                return $result_array;
            }
        } else {
            return false;
        }
    }

    public function eliminar($id){
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