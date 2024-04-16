<?php
session_start();
include('../../model/estudiante/carrito_compras_model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hours']) && isset($_POST['subject_id']) && isset($_POST['subject_name']) && isset($_POST['price'])) {
    // Obtener datos del formulario y validar
    $hours = (int)$_POST['hours']; // Convertir a entero para validar la cantidad
    $subject_id = $_POST['subject_id'];
    $subject_name = $_POST['subject_name'];
    $price = $_POST['price'];
    $id_people = $_SESSION['id_sesssion'];

    // Validar cantidad de horas (debe ser al menos 1)
    if ($hours < 1) {
        $_SESSION['error_message'] = "Error: La cantidad de horas debe ser al menos 1.";
        header('Location: controller_catalogo_estudiante.php'); // Redireccionar a la página de descripción del curso
        exit(); // Terminar el script después de la redirección
    }

    // Instanciar la clase Carrito_compras
   
    // Verificar si el curso con el mismo ID ya existe en el carrito
    
    $carrito = new Carrito_compras();

            // Insertar el curso en la base de datos
  $carrito->insertar_curso($id_people,$subject_name, $price, $hours);
  $cursos_en_carrito = $carrito->Mostrar_curso();

    

    // Agregar el curso al carrito si aún no existe
    if (!$curso_exists) {
        $_SESSION['carrito'][] = ['subject_id' => $subject_id, 'hours' => $hours, 'subject_name' => $subject_name, 'price' => $price];
    }
   
    // Calcular la cantidad total de cursos en el carrito
    $total_cursos = count($_SESSION['carrito']);

    // Almacenar la cantidad total en una variable de sesión
    $_SESSION['total_cursos'] = $total_cursos;

    // Redireccionar a la página de descripción del curso
    header('Location: controller_catalogo_estudiante.php');
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $carrito = new Carrito_compras();
    $carrito->Eliminar_curso($id);

    // Redireccionar a la página del carrito después de eliminar el producto
    header('Location: controller_catalogo_estudiante.php');
    exit();
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vaciar_carrito'])) {
      
            $carrito = new Carrito_compras();
            $carrito->vaciar_carrito();
        
        // Redireccionar a la página del catálogo después de vaciar el carrito
        header('Location: controller_catalogo_estudiante.php');
        exit();
    }
}
 else {
    // Manejar errores potenciales (por ejemplo, datos faltantes)
    $_SESSION['error_message'] = "Error: Faltan datos del formulario.";
    header('Location: controller_catalogo_estudiante.php'); // Redireccionar a la página de descripción del curso
    exit(); // Terminar el script después de la redirección
}








