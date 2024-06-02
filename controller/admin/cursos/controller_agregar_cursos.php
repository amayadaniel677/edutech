<?php
session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav
// capturar el mensaje enviado en get

include('../../../model/admin/cursos/agregar_curso_model.php');
if (isset($_GET['mensajeExito'])) {
    $mensajeExito = $_GET['mensajeExito'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categoria = $_POST['categoria'];

    $nombre_curso = ucwords(strtolower((trim($_POST['nombre-curso']))));
    $nombre_curso = preg_replace('/\s+/', ' ', $nombre_curso);


    $descripcion = $_POST['descripcion'];
    $temas = $_POST['temas'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto_post = $_FILES['foto'];
        $consult = new agregar_curso_controller();
        $errores_foto_2 = $consult->validar_foto($foto_post);
        $nombre_curso_espacios = str_replace(' ', '_', $nombre_curso);
        $foto = $consult->obtener_ruta_foto($foto_post, $nombre_curso_espacios);
    } else {
        $consult = new agregar_curso_controller();
        $errores_foto_2 = false;
        $foto = 'resource/img/photosSubjects/defaultPhoto.jpg';
    }
    $errores_inputs_2 = $consult->validar_campos($id_categoria);


    if (!$errores_inputs_2 && !$errores_foto_2) {
        $model = new agregar_curso_model();
        $result_model = $model->insertar_curso($id_categoria, $nombre_curso, $descripcion, $foto, $temas);
        if ($result_model == 1) {
            $consult->mover_borrar_foto($foto_post, $foto);
            $mensajeExito = 'Se creo el curso con EXITO';
            // redirigir a la misma pagina pero con el mensajeexito
            header('Location: controller_agregar_cursos.php?mensajeExito=' . $mensajeExito);
            // leer el mensaje de get y capturarlo, solo si existe , si no guardarlo como vacio



        } elseif ($result_model == "Ya existe un curso con ese nombre, active este curso en el catalogo si desea volver a publicarlo") {
            $mensajeExito = '';
            $errores_inputs[] = 'Ya existe un curso con ese nombre, active este curso en el catalogo si desea volver a publicarlo';
        } else {
            $mensajeExito = '';
            $errores_inputs[] = 'Error no se ingreso el curso';
        }
    } else {
        $mensajeExito = null;
        $errores_inputs = (array) $consult->errores_inputs;
        $errores_foto = (array) $consult->errores_foto;
    }
}

$consult_previa = new agregar_curso_controller();
$areas_bd = $consult_previa->traer_areas();


class agregar_curso_controller
{
    public $errores_inputs = [];
    public $errores_foto = [];
    public function __construct()
    {
    }
    public function validar_campos($id_categoria)
    {
        $error = false;


        if ($id_categoria == '0') {

            $this->errores_inputs = 'Error, seleccione una categoria';
            $error = true;
        }
        return $error;
    }

    public function validar_foto($foto)
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
    public function obtener_ruta_foto($foto, $nombre_curso)
    {
        $carpeta_destino = 'resource/img/photosSubjects/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $nombre_curso . '_' . basename($foto['name']);
        $ruta_archivo = $carpeta_destino . $nombre_archivo;
        return $ruta_archivo;
        // esto devuelve resource/img/photosUsers/dni_foto.png

    }

    public function mover_borrar_foto($foto_file, $ruta_photo)
    {

        $carpeta_destino = '../../../resource/img/photosSubjects/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }


        $ruta_archivo_nombre_archivo = '../../../' . $ruta_photo;

        // borrar foto


        if ($ruta_photo != 'resource/img/photosSubjects/defaultPhoto.jpg') {
            if (move_uploaded_file($foto_file['tmp_name'], $ruta_archivo_nombre_archivo)) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function traer_areas()
    {
        $consult = new agregar_curso_model();
        $areas_bd = $consult->traer_areas();
        if ($areas_bd) {
            return $areas_bd;
        } else {
            return false;
        }
    }
}
include('../../../view/admin/paginas/cursos/agregar_curso.php');
