<?php 
include('../../../model/admin/areas/agregar_area_model.php');


if($_POST){
    $nombre_area = $_POST['nombre_area'];
    $precio = $_POST['precio'];
    if(empty($nombre_area) || empty($precio)){
        $error="Los campos no pueden estar vacíos";
    }else{
        $agregar_area = new AgregarAreaController();    
        if($agregar_area->agregarArea($nombre_area,$precio)){
            $mensaje="Area agregada correctamente";
        }else{
            $error="Error al agregar el area";
        }   
    }
    
}

class AgregarAreaController {
    
    
    public function agregarArea($name,$price) {
        $name = trim($name);
        $name = ucfirst(strtolower($name));
        $price = trim($price);
        $agregar_area_model = new AgregarAreaModel();
        $result_model=$agregar_area_model->agregarArea($name,$price);
        return $result_model;
    }
}
include('../../../view/admin/paginas/areas/agregar_area.php');
?>