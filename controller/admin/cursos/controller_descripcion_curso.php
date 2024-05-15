<?php 


session_start();
if (!isset( $_SESSION['dni_session'])){
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio='../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/estudiante/descripcion_curso_estudiante_model.php');

if (isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];
    // Crear una instancia del modelo para acceder a las funciones
    $curso_model = new descripcionCurso();
   
    // Llamar a la función descripcion_curso para obtener los detalles del curso
    $detalle_curso = $curso_model->descripcion_curso($id_curso); 
    $mostrar_precio= $curso_model->mostrar_precio();

    $curso=$curso_model->traer_cursos($id_curso);
   
    if ($detalle_curso) {
        $area = $detalle_curso['area_name'];
        $area_id = $detalle_curso['id']; // Obtener el nombre del área del curso
        $cursos_area = $curso_model->seleccionar_curso($area_id);

      
        // Llamar a la función mostrarDocentesPorArea para obtener los docentes del área específica
        $docentes_area = $curso_model->mostrarDocentesPorArea($area);

        // Pasar los detalles del curso y los docentes a la vista
        $curso1 = $detalle_curso;
        
        $docentes = $docentes_area; // Asignar los docentes del área al arreglo de docentes

        // Incluir la vista y pasar los detalles del curso y los docentes como datos
        
    } else {
        echo "No se encontraron detalles para este curso."; 
    }
} 
if (isset($_GET['id_eliminar'])){
    $id_eliminar=$_GET['id_eliminar'];
    $consult=new descripcionCurso();
    $curso_eliminado=$consult->eliminar_curso($id_eliminar);
    if($curso_eliminado){
        $mensaje_ok="El curso fue eliminado con exito";
        header("Refresh: 3; URL=controller_catalogo_cursos.php");
    }else{
        $mensaje="El curso no puso ser eliminado, intenntelo de nuevo más tarde...";
        header("Refresh: 3; URL=controller_catalogo_cursos.php");
    }
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_post=$_POST['id'];
    $nombre_post=$_POST['nombre'];
    $descripcion_post=$_POST['descripcion'];
    $temas_post=$_POST['temas'];
    
}

class descripcion_curso{

    public $errores_foto = array(); 

    public function validar_foto($foto, $dni, $old_photo)
    {
        // VALIDAR TIPO DE IMAGEN
        $error = false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo = $foto['type'];

        if (!in_array($archivo_tipo, $tipos_permitidos)) {
            $this->errores_foto[] = 'Error: Solo se permiten archivos JPEG, JPG o PNG';
            $error = true;
        }

        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio = $foto['size'];

        if ($archivo_tamanio > $tamanio_maximo) {
            $this->errores_foto[] = 'Error: El tamaño del archivo excede el límite de 10 MB.';
            $error = true;
        }
        return $error;
    }
    public function obtener_ruta_foto($foto, $dni, $old_photo)
    {
        $carpeta_destino = 'resource/img/photosUsers/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $dni . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino . $nombre_archivo;
        return $ruta_archivo;
        // esto devuelve resource/img/photosUsers/dni_foto.png

    }

    public function mover_borrar_foto($dni, $foto_actual, $old_photo, $new_photo)
    {

        $carpeta_destino = '../resource/img/photosUsers/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }


        $ruta_archivo_nombre_archivo = '../' . $foto_actual;

        // borrar foto
        $ruta_old_photo = '../' . $old_photo;
        $ruta_default_photo = 'resource/img/photosUsers/defaultPhoto.png';


        if ($new_photo != false) {
            if (move_uploaded_file($new_photo['tmp_name'], $ruta_archivo_nombre_archivo)) {
                if ($ruta_old_photo != $ruta_default_photo && $old_photo != $foto_actual) {
                    unlink($ruta_old_photo);
                }
            }
        }
    }
}


include('../../../view/admin/paginas/cursos/descripcion_curso.php');
?>