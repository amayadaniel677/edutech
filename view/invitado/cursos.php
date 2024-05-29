

<?php 

$urlResource="../../resource/";  //son desde el controlador
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduTech | Add Curso</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../view/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../resource/css/cursos/cursos3.css" />
  
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../resource/css/inicio/nav.css" />
  <link rel="stylesheet" href="../../resource/css/layouts/footer2.css" />
  <!-- CSS CURSOS ADMIN -->

    <link rel="icon" href="../../resource/img/icons/logo-kepler-removebg-preview.png" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; ?>
            </div>
            <?php unset($_SESSION['error_message']); // Limpiar el mensaje de error después de mostrarlo ?>
        <?php endif; ?>
  <!-- Navbar -->
  <?php include('../../view/layout/nav.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->

  <!-- Fin del Main Nav Asidebar Container -->
  
  <!-- TODA LA PAGINA -->
  <div class=" mt-5">
    <!-- Titulo de la vista -->
    
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
  <div class="container-fluid p-3">
    <figcaption class="buscador">
      <div>
        <h2>CURSOS</h2>
      </div>
      <div class="form-inline">
        <div class="input-group" >
          <input class="form-control form-control-sidebar" type="search" id="search-input" placeholder="Buscar curso..." aria-label="Search">
          <div class="input-group-append">
            <br>
            <button class="btn btn-primary " id="search-button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </figcaption>
    <div class="categoria-cursos p-5">
      <?php foreach ($datos_organizados as $area => $cursos_area): ?>
      <div class="categoria-cursos">
        <div class="titulo">
          <h2><?php echo $area; ?></h2> <!-- Mostrar el nombre del área -->
        </div>
        <div class="articulos">
          <?php foreach ($cursos_area as $curso): ?>
          <article class="materias curso">
            <a href="controller_descripcion_curso_invitado.php?id_curso=<?php echo $curso['subject_id']; ?>" style="text-decoration:none;">
              <div style="height:120px;">
                <img src="<?php echo $ruta_inicio.$curso['photo']; ?>" style="height:100%;" /> <!-- Mostrar la imagen del curso -->
              </div>
              <div>
                <h5><?php echo $curso['subject_name']; ?></h5> <!-- Mostrar el nombre del curso -->
                <p><?php echo $curso['description']; ?></p> <!-- Mostrar la descripción del curso -->
              </div>
            </a>
            <div class="adquirir">
              <a href="estudiante/controller_descripcion_curso_estudiante.php?id_curso=<?php echo $curso['subject_id']; ?>" style="text-decoration:none;">ADQUIRIR</a>
            </div>
          </article>
          <?php endforeach; ?>
        </div> <!-- Cerrar div de artículos -->
      </div> <!-- Cerrar div de categoría -->
      <?php endforeach; ?>
    </div>
  </div>
</section>
    <!-- /. Maincontent -->
  </div> 
  <!-- /.content-wrapper -->

  <!-- Controlador del nav aSidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php require_once('../../view/layout/footer.php');?>
  <!--FIN   Main Footer -->

</div> <!--fin de toda la pagina wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../view/admin/dist/js/adminlte.min.js"></script>

<script>
  document.getElementById('search-button').addEventListener('click', function() {
    searchCourses();
  });

  function searchCourses() {
    var query = document.getElementById('search-input').value.toLowerCase();
    var courses = document.getElementsByClassName('curso');
    var anyCourseFound = false;

    for (var i = 0; i < courses.length; i++) {
      var courseName = courses[i].getElementsByTagName('h5')[0].innerText.toLowerCase();
      var courseDescription = courses[i].getElementsByTagName('p')[0].innerText.toLowerCase();
      var area = courses[i].closest('.categoria-cursos').getElementsByTagName('h2')[0].innerText.toLowerCase();

      if (courseName.includes(query) || courseDescription.includes(query)) {
        courses[i].style.display = 'block';
        courses[i].closest('.categoria-cursos').style.display = 'block'; // Mostrar el área
        anyCourseFound = true;
      } else {
        courses[i].style.display = 'none';
        // Ocultar el área solo si todos los cursos en esa área no coinciden con la búsqueda
        var coursesInSection = courses[i].closest('.categoria-cursos').getElementsByClassName('curso');
        var coursesMatchingQuery = Array.from(coursesInSection).filter(course => {
          var name = course.getElementsByTagName('h5')[0].innerText.toLowerCase();
          var description = course.getElementsByTagName('p')[0].innerText.toLowerCase();
          return name.includes(query) || description.includes(query);
        });
        if (coursesMatchingQuery.length === 0) {
          courses[i].closest('.categoria-cursos').style.display = 'none';
        }
      }
    }

    if (!anyCourseFound) {
      alert('No se encontraron cursos que coincidan con la búsqueda.');
    }
  }
</script>



</body>
</html>
