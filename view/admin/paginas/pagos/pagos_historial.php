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
  <!-- FUENTES PARA LAS TABLAS Y BARRA BUSQUEDA -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- LINKS DataTables -->
  <link rel="stylesheet" href="../../../view/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../view/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />

  <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
              <h1 class="m-0">Historial de pagos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_pagos">Gestionar pagos</a></li>
                <li class="breadcrumb-item active">Historial</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
        <div class="container-fluid" style="max-width:1000px;">



          <div class="card">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Docente</th>
                    <th>Fecha pago</th>
                    <th>Horas pagadas</th>
                    <th>Valor hora</th>
                    <th>Valor total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($historial_pagos as $index => $historial_pago): ?>
                    <?php 
                       setlocale(LC_TIME, 'es_ES.utf8', 'spanish', 'Spanish_Spain');

                       // Suponiendo que $venta['sale_date'] contiene la fecha en formato 'Y-m-d H:i:s'
                       $fecha_pago = $historial_pago['date'];

                       // Utiliza strftime para formatear la fecha y hora, excluyendo los segundos
                       $formatted_date = strftime('%Y-%b-%d %H:%M', strtotime($fecha_pago));

                      ?>
                    <tr class="odd">
                      <td>
                        <?= $index + 1 ?>
                      </td>
                      <td>
                        <?= $historial_pago['name'] . ' ' . $historial_pago['lastname'] ?>
                      </td>
                      <td>
                        <?= $formatted_date ?>
                      </td>
                      <td>
                        <?= $historial_pago['total_hours'] ?>
                      </td>
                      <td>
                        <?= $historial_pago['price_hour'] ?>
                      </td>
                      <td>
                        <?= $historial_pago['total_price'] ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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
    <?php include('../../../view/admin/layouts/footer.php'); ?>
    <!--FIN   Main Footer -->

  </div> <!--fin de toda la pagina wrapper -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="../../../view/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../../view/admin/plugins/jszip/jszip.min.js"></script>
  <script src="../../../view/admin/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../../view/admin/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Select2 -->
  <script src="../../../view/admin/plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2();
    });
  </script>

</body>

</html>