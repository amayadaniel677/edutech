<?php 

session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/admin/areas/agregar_area_model.php');


if($_POST){
    $nombre_area = $_POST['nombre_area'];
    $nombre_area_2 = $_POST['nombre_area_2'];
    if($nombre_area != $nombre_area_2){
        $error="Los nombres no coinciden, intente de nuevo";
    }else{
        $agregar_area = new AgregarAreaController();    
        if($agregar_area->verificarArea($nombre_area)){
            $error="El area ingresada ya existe";
            header('location:controller_buscar_area.php?error='.$error);
        }
        elseif($agregar_area->agregarArea($nombre_area)){
            $mensaje="Area agregada correctamente";
            header('location:controller_buscar_area.php?mensaje='.$mensaje);
        }else{
            $error="Error al agregar el area";
            header('location:controller_buscar_area.php?error='.$error);           
        }   
    }
    
}

class AgregarAreaController {
    
    
    public function agregarArea($name) {
        $name = trim($name);
        $name = ucfirst(strtolower($name));
        $agregar_area_model = new AgregarAreaModel();
        $result_model=$agregar_area_model->agregarArea($name);
        return $result_model;
    }
    public function verificarArea($name) {
        $name = trim($name);
        $name = ucfirst(strtolower($name));
        $agregar_area_model = new AgregarAreaModel();
        $result_model=$agregar_area_model->verificarArea($name);
        return $result_model;
    }
}

?>