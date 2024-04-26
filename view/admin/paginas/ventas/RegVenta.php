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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>EduTech | Add Curso</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />

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
              <h1 class="m-0">Pedidos pendientes</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"> Pedidos</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
        <?php
        if (isset($_GET['mensaje'])) {
          $mensaje = $_GET['mensaje'];
          // Ahora puedes utilizar $mensaje como desees, por ejemplo, mostrarlo en la página
          echo "<div class='alert alert-success'>$mensaje</div>";
        } elseif (isset($error)) {
          echo "<div class='alert alert-danger'>$error</div>";
        }

        ?>
        <div>
          <div class="">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-detalle">
              Agregar detalle<i class="bi bi-plus-circle"></i>
            </button>
            <?php include('modal_add_detalle_venta.php') ?>
          </div>

          <form action="" method='POST' class="row mb-3" id='form-venta'>

            <?php
            function getPostValue($name)
            {
              // Verifica si el campo de entrada fue enviado con el formulario
              if (isset($_POST[$name])) {
                // Devuelve el valor enviado, escapado para prevenir inyecciones de código HTML
                return htmlspecialchars($_POST[$name]);
              }
              // Si el campo no fue enviado, devuelve una cadena vacía
              return '';
            }
            ?>

            <input type="hidden" name="detallesVentaInput" id="detallesVentaInput" value="">

            <div class="col-md-6 col-12">
              <label for="nombres" style="display:block;">Nombres cliente</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                </div>
                <input required type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre" <?php echo getPostValue('nombres'); ?>>
              </div>
              <label for="dni" style="display:block;">DNI Cliente</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                </div>
                <input required type="number" class="form-control" id='dni' name="dni" placeholder="DNI" <?php echo getPostValue('nombres'); ?>>
              </div>
              <label for="correo" style="display:block;">Correo</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input required type="email" class="form-control" name="correo" id="correo" placeholder="Correo" <?php echo getPostValue('nombres'); ?>>
              </div>


              <label for="ciudad" style="display:block;">Ciudad</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-building-user"></i></span>
                </div>
                <input required type="text" class="form-control" id='ciudad' name="ciudad" placeholder="Ciudad" <?php echo getPostValue('nombres'); ?>>
              </div>

            </div>

            <div class="col-md-6 col-12">
              <label for="apellidos" style="display:block;">Apellidos cliente</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                </div>
                <input required type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Nombre" <?php echo getPostValue('apellidos'); ?>>
              </div>



              <label for="telefono" style="display:block;">Telefono</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></span>
                </div>
                <input required type="number" class="form-control" name="telefono" id='telefono' placeholder="Telefono" <?php echo getPostValue('telefono'); ?>>
              </div>

              <label for="descuento" class="col-form-label">Descuento:</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input required type="number" class="form-control" id="descuento" name="descuento" placeholder="" <?php echo getPostValue('descuento'); ?>>
              </div>

              <label for="valor-total" class="col-form-label">Valor total:</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input required readonly="" type="number" class="form-control" id="valor-total" name="valor-total" value='' placeholder="" <?php echo getPostValue('valor-total'); ?>>
              </div>
            </div>
            <button type="button" class="btn btn-success " id="btn-regventa" value=''>Registrar</button>
          </form>
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Detalles de Venta</h2>
            </div>


            <div class="card-body table-responsive p-0">
              <table id="tabla-detalles" class="table table-hover">
                <thead>
                  <tr>
                    <th>Tipo venta</th>
                    <th>Modalidad</th>
                    <th>Categoria</th>
                    <th>Nombre Curso</th>
                    <th>Horas</th>
                    <th>Valor hora/clase</th>
                    <th>Subtotal</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>

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
  </div>
  <!--fin de toda la pagina wrapper -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->

  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>

  <script src="../../../resource/js/admin/ventas/modal_detalle_venta2.js"></script>

  <!-- REQUIRED SCRIPTS -->
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script src="../../../resource/js/admin/ventas/alert_registrar_venta1.js"></script>

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
    $(function() {
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
</body>

</html>

<!-- *********************************************** -->