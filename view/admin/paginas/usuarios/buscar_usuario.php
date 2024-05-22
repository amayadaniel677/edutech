<?php
$urlStarter = '../../../view/admin/';  //son desde el controlador
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
  <link rel="stylesheet" href="../../../resource/css/users/buscar_usuario1.css" />


  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
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
              <h1 class="m-0">Buscar usuarios como <?php echo $_SESSION['rol_session'] ;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_usuario.php">Usuarios</a></li>
                <li class="breadcrumb-item active">Buscar usuarios</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
        <div class="row justify-content-center">
          <div class="col-md-4 col-sm-6 col-12">
            <a class="info-box bg-info" href='controller_usuarios_totales.php?tipo_usuario=docente'>
              <span class="info-box-icon"><i class="fas fa-chalkboard-teacher"></i></span>

              <div class="info-box-content">
                <h5 class="info-box-text">Ver Docentes</h5>
                <span class="info-box-number">48</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  Lista docentes activos
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <a class="info-box bg-success" href='controller_usuarios_totales.php?tipo_usuario=estudiante'>
              <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <h5 class="info-box-text">Ver estudiantes</h5>
                <span class="info-box-number">120</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  estudiantes activos
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4 col-sm-6 col-12">
            <a class="info-box bg-warning" href='controller_usuarios_totales.php?tipo_usuario=todos'>
              <span class="info-box-icon"><i class="fas fa-users"></i> </span>

              <div class="info-box-content">
                <h5 class="info-box-text">Ver todos </h5>
                <span class="info-box-number">41,410</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 90%"></div>
                </div>
                <span class="progress-description">
                  Listado usuarios activos
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <a class="info-box bg-danger" href='controller_usuarios_totales.php?tipo_usuario=inactivo'>
              <span class="info-box-icon"><i class="fas fa-users"></i> </span>

              <div class="info-box-content">
                <h5 class="info-box-text">Ver Inactivos </h5>
                <span class="info-box-number">41,410</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">
                  Listado usuarios activos
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
        </div>
        <?php if($_SESSION['rol_session']=='administrador'):?>
        <div class="row justify-content-center">
          <div class="col-md-4 col-sm-6 col-12">
            <a class="info-box bg-gray " href='controller_usuarios_totales.php?tipo_usuario=todosSuperAdmin'>
              <span class="info-box-icon"><i class="fas fa-users"></i> </span>

              <div class="info-box-content">
                <h5 class="info-box-text">Ver todos como SUPERADMIN </h5>
                <span class="info-box-number">41,410</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 90%"></div>
                </div>
                <span class="progress-description">
                  Se incluyen los administradores e inactivos
                </span>
              </div>
              <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

        </div>
        <?php endif;?>
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