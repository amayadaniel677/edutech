<?php 
session_start();
include('../../view/docente/asistencia_docente.php');

$areas_subjects = new areas_subjects_Consult();
$docente_id = $_SESSION['id_session']; // Suponiendo que se guarda el ID del docente en la sesión
$subjects = $areas_subjects->getStudentsBySubjectId($docente_id);

if (isset($_POST['materia'])){
    $materia_id=$_POST['materia'];
    $hora=$_POST['hora'];
    $fechaHoy = date('Y-m-d');

} 
?>