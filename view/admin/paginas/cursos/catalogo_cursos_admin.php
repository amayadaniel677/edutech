<?php 
$urlStarter='../../../view/admin/'; 
$urlResource='../../../resource/'; //son desde el controlador
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
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="stylesheet" href="../../../resource/css/cursos/cursos1.css" />
  <link rel="stylesheet" href="http://localhost/edutech-project/resource/css/cursos/cursos1.css" />
 
  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
  <link rel="stylesheet" href="../../../resource/css/layouts/footer.css" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <?php include('../../../view/admin/layouts/nav.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->
  <?php include('../../../view/admin/layouts/nav_aside.php'); ?>
  <!-- Fin del Main Nav Asidebar Container -->
  
  <!-- TODA LA PAGINA -->
  <div class="content-wrapper">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Catalogo Cursos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_gestionar_cursos">Cursos</a></li>
                <li class="breadcrumb-item active">Catalogo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
    <div class="container-button">
      <a type="button" class="button btn btn-outline-success" href='controller_agregar_cursos.php'>
        <span class="button__text">Agregar curso</span>
        <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
      </a>
      </div>
      <figcaption class="buscador mt-3">
      <div>
        <h2>CURSOS</h2>
      </div>
      <div>
        <form action="#">
          <input type="search" class="buscador" placeholder="Buscar Curso" />
        </form>
      </div>
    </figcaption>
    <br>

    <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; ?>
            </div>
            <?php unset($_SESSION['error_message']); // Limpiar el mensaje de error después de mostrarlo ?>
        <?php endif; ?>
  
        <section class="content">
      <div class="container-fluid"  style="max-width:1000px;">
      
    <div class="categoria-cursos">
    <?php foreach ($datos_organizados as $area => $cursos_area): ?>
        <div class="categoria-cursos">
            <div class="titulo">
                <h2><?php echo $area; ?></h2> <!-- Mostrar el nombre del área -->
            </div>
            <div class="articulos">
                <?php foreach ($cursos_area as $curso): ?>
                    <article class="materias">
                        <a href="controller_descripcion_curso.php?id_curso=<?php echo $curso['subject_id']; ?>">
                        <div style= "height:120px;">
    <img src="<?php echo $ruta_inicio.$curso['photo']; ?>" style= "height:100%;" /> <!-- Mostrar la imagen del curso -->
</div>
                            <div>
                                <h5><?php echo $curso['subject_name']; ?></h5> <!-- Mostrar el nombre del curso -->
                                <p><?php echo $curso['description']; ?></p> <!-- Mostrar la descripción del curso -->
                            </div>
                        </a>
                        <div class="adquirir">
                            <a href="controller_descripcion_curso.php?id_curso=<?php echo $curso['subject_id']; ?>">ADQUIRIR</a>
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
  <?php include('../../../view/admin/layouts/footer.php'); ?>
  <!--FIN   Main Footer -->

</div> <!--fin de toda la pagina wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>
</html>




