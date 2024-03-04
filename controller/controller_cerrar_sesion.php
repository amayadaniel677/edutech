

<?php 



// Obtener la ruta_inicio
$clickcerrar = isset($_GET['clickcerrar']) ? urldecode($_GET['clickcerrar']) : '';

// Ahora $ruta_inicio contiene el valor que enviaste desde el enlace

if($clickcerrar==='1'){
    $cerrar=new session();
    $cerrar->cerrar_session($ruta_inicio);
}


class session {
 public function cerrar_session(){
    session_start();
    session_unset();
    session_destroy();
    header('Location:../controller/login_controller.php');
    exit();
}
}

?>