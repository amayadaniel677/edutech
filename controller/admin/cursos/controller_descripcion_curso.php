<?php


session_start();
if (!isset($_SESSION['dni_session'])) {
    header('location:../../login_controller.php');
    exit();
}
$ruta_inicio = '../../../';  //esta ruta se usa para cerrar sesion en el nav

include('../../../model/estudiante/descripcion_curso_estudiante_model.php');

if (isset($_GET['id_curso'])) {
    $id_curso = $_GET['id_curso'];
    // Crear una instancia del modelo para acceder a las funciones
    $curso_model = new descripcionCurso();

    // Llamar a la función descripcion_curso para obtener los detalles del curso
    $detalle_curso = $curso_model->descripcion_curso($id_curso);
    $mostrar_precio = $curso_model->mostrar_precio();

    $curso = $curso_model->traer_curso_seleccionado($id_curso);

    if ($detalle_curso) {
        $area = $detalle_curso['area_name'];
        $area_id = $detalle_curso['id']; // Obtener el nombre del área del curso
        $cursos_area = $curso_model->seleccionar_cursos_sugeridos($area_id);


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
if (isset($_GET['id_eliminar'])) {
    $id_eliminar = $_GET['id_eliminar'];
    $status = $_GET['status'];
    $consult = new descripcionCurso();
    $curso_eliminado = $consult->eliminar_curso($id_eliminar,$status);
    if ($curso_eliminado) {
        if($status=='active'){
            $mensaje_ok = "El curso fue desactivado con exito";
        }elseif($status== "inactive"){
            $mensaje_ok = "El curso fue activado con exito";   
        }
        header("Refresh: 3; URL=controller_catalogo_cursos.php");
    } else {
        $mensaje_error = "El curso no puso ser eliminado, intenntelo de nuevo más tarde...";
        header('Refresh: 3; URL=controller_descripcion_curso.php?id_curso=' . $id_curso );
    }
}

if (isset($_GET['mensaje_ok'])) {
    $mensaje_ok = $_GET['mensaje_ok'];
}
if (isset($_GET['mensaje_warning'])) {
    $mensaje_warning = $_GET['mensaje_warning'];
}
if (isset($_GET['errores'])) {
    $errores = $_GET['errores'];
    $errores = explode('%', $errores);
}







if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        $_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&
        empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0
    ) {
        $mensaje_warning = "El archivo que envió excede nuestros limites, vuelva a intentarlo";
        $id_post_encoded = urlencode($id_post); // Codifica la variable $id_post
            // Construye la URL con ambos parámetros
         header('Location: controller_catalogo_cursos.php?mensaje_warning='.$mensaje_warning);

    }
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['temas'])) {
        $id_post = $_POST['id'];
        $nombre_post = $_POST['nombre'];
        $nombre_post_editado = trim($nombre_post);
        $nombre_post_editado = preg_replace('/\s+/', ' ', $nombre_post_editado);
        $nombre_post_editado = str_replace(' ', '_', $nombre_post_editado);
        $descripcion_post = $_POST['descripcion'];
        $temas_post = $_POST['temas'];
        if (isset($_FILES['new-photo']) && $_FILES['new-photo']['error'] === UPLOAD_ERR_OK) {
            // Procesar la foto
            $new_photo = $_FILES['new-photo'];
            $old_photo = $curso['photo'];
            $validaciones = new descripcion_curso();
            $errores_foto = $validaciones->validar_foto($new_photo);
            $foto = $validaciones->obtener_ruta_foto($new_photo, $nombre_post_editado);
        } else {
            $new_photo = false;
            $validaciones = new descripcion_curso();
            $errores_foto = false;
            $old_photo = $curso['photo'];
            $foto = $old_photo; // O cualquier otra acción que desees tomar
        }

        $errores_inputs = $validaciones->validar_inputs($nombre_post, $descripcion_post, $temas_post);

        if (!$errores_foto && !$errores_inputs) {

            // HASTA ACÁ LLEGAMOS FALTA MOVER Y BORRAR LA FOTO EN EL MODELO Y ENVIAR LA LISTA DE ERRORES
            $actualizar_model = new descripcionCurso();
            $actualizar_datos = $actualizar_model->editar_curso($id_post, $nombre_post, $descripcion_post, $foto, $temas_post);
            if ($actualizar_datos) {
                $mensaje_ok = "INFORMACIÓN ACTUALIZADA CORRECTAMENTE!";
                $validaciones->mover_borrar_foto($foto,$old_photo,$new_photo);
                $id_post_encoded = urlencode($id_post); // Codifica la variable $id_post
                $mensaje_ok_encoded = urlencode($mensaje_ok); // Codifica el mensaje de éxito
                // Construye la URL con ambos parámetros
                $url = 'controller_descripcion_curso.php?id_curso='. $id_post_encoded. '&mensaje_ok='. $mensaje_ok_encoded;
                // Usa header('Refresh') para redirigir con un retardo de 4 segundos
                header('location:'. $url);
              
            }else{
                $mensaje_error = "ERROR: NO SE PUDO ACTUALIZAR LA INFORMACIÓN";
                $id_post_encoded = urlencode($id_post); // Codifica la variable $id_post
                $mensaje_error_encoded = urlencode($mensaje_error); // Codifica el mensaje de error
                
                // Construye la URL con ambos parámetros
                $url = 'controller_descripcion_curso.php?id_curso='. $id_post_encoded. '&mensaje_error='. $mensaje_error_encoded;
                
                // Usa header('Refresh') para redirigir con un retardo de 4 segundos
                header('location:'. $url);
              
            }
           
            
        } else {
            $erroresInputs='';
            $erroresFoto  = $validaciones->errores_foto;
            if($errores_inputs){
               $erroresInputs='Error: Todos los campos son obligatorios y no pueden estar vacíos';
            }
            $errores = array();
            if (!empty($erroresFoto)) {
                foreach ($erroresFoto as $error) {
                    $errores[] = $error;
                }
            }
            if (!empty($erroresInputs)) {
                $errores[] = $erroresInputs;
            }
            // Redirige con los errores
            $id_post_encoded = urlencode($id_post); // Codifica la variable $id_post
            $errores_encoded = urlencode(implode('%', $errores)); // Codifica la lista de errores
            
            // Concatena ambas variables con el signo igual (=) y utiliza urlencode() para codificar toda la cadena
            header('Location: controller_descripcion_curso.php?id_curso='.$id_post_encoded.'&errores='.$errores_encoded);
         // Asegúrate de llamar a exit() después de header()
            

            
        }
    }
}

class descripcion_curso
{

    public $errores_foto = array();
    public function validar_inputs($nombre, $descripcion, $temas)
    {
        if (empty($nombre) || empty($descripcion) || empty($temas)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_foto($foto)
    {
        // VALIDAR TIPO DE IMAGEN
        $error = false;
        $tipos_permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        $archivo_tipo = $foto['type'];

        if (!in_array($archivo_tipo, $tipos_permitidos)) {
            $this->errores_foto[] = 'Error de foto: Solo se permiten archivos JPEG, JPG o PNG';
            $error = true;
        }

        $tamanio_maximo = 10 * 1024 * 1024; // 10 MB en bytes
        $archivo_tamanio = $foto['size'];

        if ($archivo_tamanio > $tamanio_maximo) {
            $this->errores_foto[] = 'Error de foto: El tamaño del archivo excede el límite de 10 MB.';
            $error = true;
        }

        return $error;
    }
    public function obtener_ruta_foto($foto, $nombre_post_editado)
    {
        $carpeta_destino = 'resource/img/photosSubjects/';
        // Construir el nombre del archivo con el id o cédula de la persona
        $nombre_archivo = $nombre_post_editado . '_' . basename($foto['name']);

        $ruta_archivo = $carpeta_destino . $nombre_archivo;
        return $ruta_archivo;
        // esto devuelve resource/img/photosUsers/dni_foto.png

    }

    public function mover_borrar_foto( $foto_actual, $old_photo, $new_photo)
    {

        $carpeta_destino = '../../../resource/img/photosSubjects/';

        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }


        $ruta_archivo_nombre_archivo = '../../../' . $foto_actual;

        // borrar foto
        $ruta_old_photo = '../../../' . $old_photo;
        $ruta_default_photo = 'resource/img/photosSubjects/defaultPhoto.jpg';
        if ($new_photo != false) {
            if (move_uploaded_file($new_photo['tmp_name'], $ruta_archivo_nombre_archivo)) {
                if ($ruta_old_photo != $ruta_default_photo && $old_photo != $foto_actual) {
                    unlink($ruta_old_photo);
                    echo "foto movida y borrada con exito";
                }
            }
        }
    }
}


include('../../../view/admin/paginas/cursos/descripcion_curso.php');
