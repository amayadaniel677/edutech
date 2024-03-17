<?php
 include('../../../model/admin/cursos/agregar_curso_model.php');

    if ($_SERVER['request_method' == 'POST']) {
    $categoria = $POST['categoria'];
    $nombre_curso = $POST['nombre-curso'];
    $descripcion = $POST['descripcion'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto_post = $FILE['foto'];
        $consult = new agregar_curso_controller();
        $foto = $consult->validar_foto($foto_post, $nombre_curso);
        $validar=$consult->validar_campos($categoria, $nombre_curso, $descripcion, $foto);
        if ($validar) {
            $mensaje = 'Se creo el curso con EXITO';
        } else {
            $mensaje = 'Error no se ingreso el curso';
        }
    } else {
        $foto = 'resource/img/photosUsers/defaultPhoto.png';
        $consult = new agregar_curso_controller();
        $validar=$consult->validar_campos($categoria, $nombre_curso, $descripcion, $foto);
        if ($validar) {
            $mensaje = 'Se creo el curso con EXITO';
        } else {
            $mensaje = 'Error no se ingreso el curso';
        }
    }
}

$consult_previa=new agregar_curso_controller();
$areas_bd=$consult_previa->traer_areas();


class agregar_curso_controller
{
    public $array_errores = [];
    public $errores_foto = [];
    public function __construct()
    {
    }
    public function validar_campos($categoria, $nombre, $descripcion, $foto)
    {
        
        if (empty($nombre_curso) || empty($categoria) || empty($descripcion)) {
            $this->array_errores = 'VALIDE LOS CAMPOS';
        } else {
            $model = new agregar_curso_model();
            $model->insertar_curso($categoria, $nombre, $descripcion, $foto);
        }
    }

    public function validar_foto($foto, $dni)
    {
        // VALIDAR TIPO DE IMAGEN
        $error = false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo = $foto['type'];

        if (!in_array($archivo_tipo, $tipos_permitidos)) {
            $this->errores_foto[] = 'Error: Solo se permiten archivos JPEG, JPG o PNG';
            $error = true;
        }

        // Validar el tamaño del archivo (10 MB en este ejemplo)
        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio = $foto['size'];

        if ($archivo_tamanio > $tamanio_maximo) {
            $this->errores_foto[] = 'Error: El tamaño del archivo excede el límite de 10 MB.';
            $error = true;
        }

        $carpeta_destino = '../resource/img/photosUsers/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }

        $carpeta_destino2 = 'resource/img/photosUsers/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $dni . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino2 . $nombre_archivo;
        $ruta_archivo_nombre_archivo = '../' . $ruta_archivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_archivo_nombre_archivo)) {
            return ($ruta_archivo);
        }
    }

    public function traer_areas(){
        $consult= new agregar_curso_model();
        $areas_bd=$consult->traer_areas();
        if($areas_bd){
            return $areas_bd;
        }else{
            return false;
        }
    }
} 
include('../../../view/admin/paginas/cursos/agregar_curso.php');
