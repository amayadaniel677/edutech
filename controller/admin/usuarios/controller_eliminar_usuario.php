<?php

if(isset($_GET['id_usuario'])){
    $id_usuario = $_GET['id_usuario'];
}

include('../../../view/admin/paginas/usuarios/eliminar_usuario.php');
?>