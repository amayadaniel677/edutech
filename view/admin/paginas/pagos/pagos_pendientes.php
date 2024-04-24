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
  <title>EduTech | Pagos Pendientes-Docentes</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="stylesheet" href="../../../resource/css/payments/pagos_historial.css" />
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
              <h1 class="m-0"> Pagos pendientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"> Pendientes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
        <div class="container-fluid">

          <!-- /.card-body -->
          <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Docente</th>
                        <th>Ultimo pago</th>
                        <th>Horas totales</th>
                        <th>Pagar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($pagos as $index => $pago) : ?>
                        <tr class="odd">
                          <td><?= $index + 1 ?></td>
                          <td><?= $pago['name'] . ' ' . $pago['lastname'] ?></td>
                          <td><?= $pago['last_pay'] ?></td>
                          <td><?= $pago['total_hours'] ?></td>
                          <td>
                            <form method="POST" action="">
                              <div class="row">

                                <input type="hidden" name="pago_id" value="<?= $pago['id'] ?>">

                                <div class="col-md-3">
                                  <input type="number" name="cantidad" class="form-control" placeholder="Cantidad horas">
                                </div>
                                <div class="col-md-3">
                                  <input type="number" name="valor_horas" class="form-control" placeholder="Valor horas">
                                </div>
                                <div class="col-md-3">
                                  <input type="number" name="valor_total" class="form-control" placeholder="Valor total">
                                </div>
                                <div class="col-md-3">
                                  <button type="submit" class="btn btn-primary">Pagar</button>
                                </div>
                              </div>
                            </form>
                          </td>

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

            
              

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
  
 <!-- DataTables  & Plugins -->


  <!-- alerta de agregar pago -->
  <script src="../../../resource/js/admin/pagos/alert_pagos_pendientes.js"></script>

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
<!-- AdminLTE App -->
<script src="../../../view/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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

  
</script>
</body>

</html>