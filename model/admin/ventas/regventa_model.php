<?php 
class RegVenta_consult{

    private $con;

    public function __construct(){
        $this->con = new mysqli("localhost","root","","edutech");
        $this->con->set_charset("utf8");
    }

    public function nombre_area(){
        $sql = "SELECT name FROM areas";
        $result = $this->con->query($sql);

        if ($result === false) {
            return array('error' => true, 'message' => "Error en la consulta SQL: " . $this->con->error);
        }

        if ($result->num_rows > 0) {
            $nombres = array();
            while ($row = $result->fetch_assoc()) {
                $nombres[] = $row['name'];
            }
            return $nombres;
        } else {
            return array('error' => true, 'message' => "La consulta no devolvió resultados.");
        }
    
    }
    public function obtenerIdAreas($nombreArea){
        $sql="SELECT id FROM areas Where name='$nombreArea'";
        $result=$this->con->query($sql);
        if($result->num_rows > 0 ){
            while($row=$result->fetch_assoc()){
               $categoriaId= $row['id'];
            }
            return $categoriaId;
        }
    }

    public function nombre_subject($categoria){
        
        $id=$this->obtenerIdAreas($categoria);
        $sql="SELECT name FROM subjects WHERE areas_id='$id'";
        $result=$this->con->query($sql);
        if($result->num_rows > 0){
            $nombres_subjects=array();
            while($row=$result->fetch_assoc()){
                $nombres_subjects[]=$row['name'];
            }
           
            return $nombres_subjects ;
        }else{
            $error_message[]='Base de datos con campos vacíos';
            return $error_message;
        }
    }

    public function precio_area($categoria){
        $sql="SELECT price FROM areas WHERE name='$categoria'";
        $result=$this->con->query($sql);

        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                $precio_area=$row['price'];
            }
            return $precio_area;
        }else{
            $precio_area[]='Base de datos con campos vacíos';
            return $precio_area;
        }
    }
}

?>
