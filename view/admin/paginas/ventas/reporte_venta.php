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

  <link rel="stylesheet" href="../../../resource/css/sales/reporte_venta1.css" />
  <link rel="icon" href="resource/img/icons/logo-kepler-removebg-preview.png" />

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  

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
              <h1 class="m-0">Reporte</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Agregar curso</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">

            <div class="cuerpo">
              <div class="formulario">
                <form action="controller_tabla_ventas.php" method="POST">
                  <label for="fecha-inicio">Fecha inicio del reporte<br /><input type="date" id="fecha-inicio" class="form-control" name="fecha-inicio" /></label>
                  <label for="fecha-fin">Fecha fin del reporte<br /><input type="date" id="fecha-fin" class="form-control" name="fecha-fin" /></label>
                  <label for="curso">
                    <h3>Seleccionar Area</h3>
                    <select name="area" id="area" class="form-control">
                      <?php
                      foreach ($areas as $area) { ?>
                        <option value="<?= $area['id'] ?>"><?= $area['name'] ?></option>
                      <?php } ?>
                    </select>
                  </label>
                  <label for="curso">
                    <h3>Seleccionar curso</h3>
                    <select name="curso" id="curso" class="form-control">
                      <?php
                      foreach ($materias as $materia) { ?>
                        <option value="<?= $materia['id'] ?>"><?= $materia['name'] ?></option>
                      <?php } ?>
                    </select>
                  </label>
                  <div>
                    <input type="submit" value="Generar" class="btn btn-success" />

                  </div>
                </form>
              </div>
              <div class="imagen">
                <img src="../../../resource/img/adm_ventas/repventa.png" alt="repventa" />
              </div>
            </div>
            <script>
              $('#area').click(regresar);

              function regresar(){
                $.ajax({
                  url: 'controller_reporte_venta.php',
                  type: 'POST',
                  dataType: 'json',
                  data:{
                    area:$('#area').val()
                  }
                }).done(
                  function(data){
                    area:$('#area').val()
                  }
                );
              }
            </script>

          </div>
        </div>
      </section>
      <!-- /. Maincontent -->
    </div> <!-- este puede estar mal, es de toda la pagina -->
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