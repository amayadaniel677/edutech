<?php 
class RegVenta_consult{

    private $con;

    public function __construct() {
        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
    
        try {
            $this->con = new mysqli("localhost", "edutech", "edutechadso2024", "edutech");
        } catch (mysqli_sql_exception $e) {
            // Intenta conectar con la segunda opción si la primera falla
            try {
                $this->con = new mysqli("localhost", "root", "", "edutech");
            } catch (mysqli_sql_exception $e) {
                // Maneja el error de conexión aquí
                echo "Error al conectar: " . $e->getMessage();
                // Considera lanzar una excepción o manejar el error de otra manera
            }
        }
    
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

    // METODOS PARA AGREGAR LA VENTA
    public function agregar_venta_completa($nombres,$apellidos,$dni,$correo,$ciudad,$telefono,$descuento,$valor_total){
    //    si existe el usuario
    $user_exist=$this->user_exist($dni);
    if(!$user_exist){
       $registrar=$this->user_register($nombres,$apellidos,$dni,$correo,$ciudad,$telefono);
       $user_exist=$this->user_exist($dni);
    }
    if($user_exist){
        $date = date("Y-m-d");
        $sql="INSERT INTO sales(price,`date`,people_id) VALUES('$valor_total','$date','$user_exist')";
        $result=$this->con->query($sql);
        if($result){
            // Obtener el ID de la última inserción
            $lastInsertedId = $this->con->insert_id;
            return $lastInsertedId;
        }
        else{
            return false;
        }
    }else{
        return false;
    }


    }
    public function user_exist($dni){
        $sql="SELECT * FROM people WHERE dni='$dni'";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
            return  $row['id'];
        }else{
            return false;
        }
    }
    public function user_register($nombres,$apellidos,$dni,$correo,$ciudad,$telefono){
        $contrasenia_encriptada=password_hash($dni,PASSWORD_DEFAULT,['cost'=>10]);
        $rol='estudiante';
        $dni_type='NA';
        $foto='resource/img/photosUsers/defaultPhoto.png';
        $sql="INSERT INTO people(`name`,lastname,dni,email,city,phone,`password`,rol,dni_type,photo) VALUES('$nombres','$apellidos','$dni','$correo','$ciudad','$telefono','$contrasenia_encriptada','$rol','$dni_type','$foto')";
        $result=$this->con->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function agregar_detalles_venta($detallesVenta,$sales_id){
        $cantidadDetalles = count($detallesVenta);
        $exitoDetalles=0;
        foreach($detallesVenta as $detalle){
            $price=$detalle['valorCurso'];
            $total_hours=$detalle['horas'];
            $subjects_id=$this->obtener_id_curso($detalle['curso']);
            $sql="INSERT INTO subject_sale(price,total_hours,subjects_id,sales_id,remaining_hours) VALUES('$price','$total_hours','$subjects_id','$sales_id','$total_hours') ";
            $result=$this->con->query($sql);
            if($result){
                $exitoDetalles += 1;
            }
        }
        if($cantidadDetalles == $exitoDetalles){
            return true;
        }else{
            false;
        }

    }
    public function obtener_id_curso($curso){
        $sql="SELECT id FROM subjects WHERE `name`='$curso' ";
        $result=$this->con->query($sql);
        if($result->num_rows>0){
     // Utilizamos fetch_assoc para obtener un array asociativo
        $fila = $result->fetch_assoc();
        // Accedemos al valor de la columna 'id'
        $id = $fila['id'];
        return $id;
        }else{
            return false;
        }
    }
}

?>
