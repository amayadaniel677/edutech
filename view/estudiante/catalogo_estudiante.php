

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
  <link rel="stylesheet" href="../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../resource/css/cursos/cursos1.css" />
  
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
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
    <?php include('../../view/layout/nav_top_estudiante.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->
  <?php include('../../view/layout/nav_aside_estudiante.php'); ?>
  <!-- Fin del Main Nav Asidebar Container -->
  
  <!-- TODA LA PAGINA -->
  <div class="content-wrapper">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panell </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agregar producto</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
      <div class="container-fluid">
      <figcaption class="buscador">
      <div>
        <h2>CURSOS</h2>
      </div>
      <div>
        <form action="#">
          <input type="search" class="buscador" placeholder="Buscar Curso" />
        </form>
      </div>
    </figcaption>
    <div class="categoria-cursos">
    <?php foreach ($datos_organizados as $area => $cursos_area): ?>
        <div class="categoria-cursos">
            <div class="titulo">
                <h2><?php echo $area; ?></h2> <!-- Mostrar el nombre del área -->
            </div>
            <div class="articulos">
                <?php foreach ($cursos_area as $curso): ?>
                    <article class="materias">
                        <a href="controller_descripcion_curso_estudiante.php?id_curso=<?php echo $curso['subject_id']; ?>">
                        <div style= "height:120px;">
    <img src="../../<?php echo $curso['photo']; ?>" style= "height:100%;" /> <!-- Mostrar la imagen del curso -->
</div>
                            <div>
                                <h5><?php echo $curso['subject_name']; ?></h5> <!-- Mostrar el nombre del curso -->
                                <p><?php echo $curso['description']; ?></p> <!-- Mostrar la descripción del curso -->
                            </div>
                        </a>
                        <div class="adquirir">
                            <a href="controller_descripcion_curso_estudiante.php?id_curso=<?php echo $curso['subject_id']; ?>">ADQUIRIR</a>
                            <p class="descuento">20%DTO</p>
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
  <?php include('../../view/admin/layouts/footer.php'); ?>
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
</body>
</html>




