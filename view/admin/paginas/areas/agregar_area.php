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
  <title>AdminLTE 3 | Starter</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!--VISTA BRAYAN INICIO ADMIN -->

  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include('../../../view/admin/layouts/nav.php'); ?>
    <?php include('../../../view/admin/layouts/nav_aside.php'); ?>
    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Agregar area</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Areas</a></li>
                <li class="breadcrumb-item active">Agregar area</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <?php if (!empty($mensaje)) : ?>
          <div class="alert alert-success">
            <?php echo  $mensaje  ?>

          </div>
        <?php endif; ?>
        <?php if (!empty($error)) : ?>
          <div class="alert alert-danger">
            <?php echo  $error; ?>

          </div>
        <?php endif; ?>

        <div class="container-fluid"  style="max-width:1000px;">
          <div class="row">
            <div class="col-lg-6">
              <form action="#" method='POST'>
                <div class="form-group row">
                  <label for="agregar_area" class="col-sm-4 col-form-label">Agregar Area: </label>
                  <div class="col-sm-8">
                    <input type="text" name="nombre_area" id="nombre_area" placeholder="Escriba el nombre" name='nombre_area' class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="precio" class="col-sm-4 col-form-label">Precio: </label>
                  <div class="col-sm-8">
                    <input type="number" id="precio"  name='precio' placeholder="Escriba el precio" class="form-control">
                  </div>
                </div>

                <div class="form-group ">
                  <button type="submit" class="btn btn-success btn-md w-50 mt-3">Agregar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <style>
          @media (max-width: 768px) {
            .col-lg-6 {
              width: 100% !important;
            }
          }
        </style>
    </div>


    <!-- /. Maincontent -->

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