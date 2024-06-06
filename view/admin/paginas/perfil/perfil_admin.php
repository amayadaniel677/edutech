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
  <!-- SwadeetAlert2 -->
  <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- css alertas mensajes -->
  <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="stylesheet" href="../../../resource/css/users/gestionar_usuario.css" />
  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
  <style>
    .custom-file-input {
      cursor: pointer;
      /* Cambia el cursor al pasar por encima del botón */
    }

    .custom-file-label::after {
      content: "Elegir archivo";
      /* Texto que aparece en el botón */
    }

    .custom-file-input:focus~.custom-file-label {
      border-color: #007bff;
      /* Color del borde cuando el input file está enfocado */
    }

    .custom-file-input:disabled~.custom-file-label {
      background-color: #e9ecef;
      /* Color de fondo cuando el input file está desactivado */
    }
  </style>
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
              <h1 class="m-0"> Mi perfil</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item active">Perfil</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->

      <?php
      include('../../../view/layout/perfil_usuario.php');
      ?>
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
  <!-- sweet alert -->
  <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <?php
  $mensaje_ok = $mensaje_ok ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_recibido = $mensaje_recibido ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_warning = $mensaje_warning ?? ''; // Asegura que $mensaje_editar esté definido
  $mensaje_info = $mensaje_info ?? ''; // Asegura que $mensaje_editar esté definido
  ?>
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        width: '80%',
        customClass: {
          container: 'mi-clase-personalizada'
        }


      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: '<?php echo $mensaje_ok; ?>'

        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: '<?php echo $mensaje_info; ?>'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: '<?php echo $mensaje_recibido; ?>'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: '<?php echo $mensaje_warning; ?>'
        })
      });
      $('.swalDefaultQuestion').click(function() {
        Toast.fire({
          icon: 'question',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Verificar si la variable $mensaje_editar está definida
      <?php if (isset($mensaje_ok) && !empty($mensaje_ok)) : ?>
        $('#btnSuccess').click();
      <?php endif; ?>
      <?php if (isset($mensaje_recibido) && !empty($mensaje_recibido)) : ?>
        $('#btnError').click();
      <?php endif; ?>
      <?php if (isset($mensaje_warning) && !empty($mensaje_warning)) : ?>
        $('#btnWarning').click();
      <?php endif; ?>
      <?php if (isset($mensaje_info) && !empty($mensaje_info)) : ?>
        $('#btnInfo').click();
      <?php endif; ?>


    });
  </script>
  <!-- AdminLTE App -->
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>