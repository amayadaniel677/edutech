<?php 
include('../../../model/admin/cursos/agregar_curso_model.php');

if($_SERVER['request_method'=='POST']){
    $categoria=$POST['categoria'];
    $nombre_curso=$POST['nombre-curso'];
    $descripcion=$POST['descripcion'];
    
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto=$FILE['foto'];
    } else {
        $foto = 'resource/img/photosUsers/defaultPhoto.png';
    }
}


class agregar_curso_controller{
    public $array_errores=[];
    public $errores_foto=[];
    public function __construct (){

    }
    public function validar_campos (){
        $error=false;
        if (empty($nombre_curso) || empty($categoria) || empty($descripcion) || empty($foto) ){

        }
    }
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
include('../../../view/admin/paginas/cursos/agregar_curso.php');
?>