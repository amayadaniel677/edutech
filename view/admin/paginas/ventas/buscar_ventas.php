</body>

</html>
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
  <title>EduTech | Buscar</title>
  <!-- LINKS DataTables -->
  <link rel="stylesheet" href="../../../view/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
  <!-- css alertas mensajes -->
  <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" /> <!-- necesario para el tamaño de mensajes alerta  -->

  <style>
    .mi-clase-personalizada .swal2-popup {
      font-size: 16px !important;
      height: auto !important;
      padding-bottom: 4px !important;
    }

    .swal2-popup h2 {
      margin-top: 8px !important;
      font-size: 18px !important;
    }
    .content-wrapper{
      height: auto !important;
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
              <h1 class="m-0">Buscar ventas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_ventas.php">Ventas</a></li>
                <li class="breadcrumb-item active">Buscar ventas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
       
        <button id="btnInfo" type="button" class="btn btn-success swalDefaultSuccess" style="display:none ">
          error
        </button>
        <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">
          error
        </button>
        <div class="container-fluid" style="max-width:1000px;">

          <div class="container">


            <form method="POST" action='controller_ventas_filtradas.php'>
              <input value='<?php if (isset($_POST['dni'])) {
                              echo $_POST['dni'];
                            } ?>' type="hidden" class="form-control" name="dni" id="dni" placeholder="Ingrese el DNI">
              <div class="row">

                <div class="col-md-4">


                  <div class="form-group">
                    <label><b>Fecha inicio</b></label>
                    <input required type="date" name="from_date" value="<?php if (isset($_POST['from_date'])) {
                                                                          echo $_POST['from_date'];
                                                                        } ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><b>Fecha final</b></label>
                    <input required type="date" name="to_date" value="<?php if (isset($_POST['to_date'])) {
                                                                        echo $_POST['to_date'];
                                                                      } ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label><b><br></b></label> <br>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>

                </div>
              </div>
              <br>
            </form>

          </div>
          <!-- tabla -->
          <div class="container mt-2">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ventas realizadas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID Venta</th>
                      <th scope="col">dni</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($ventas_paginadas)) {

                      $ventas_reverse = $ventas_paginadas;
                      foreach ($ventas_reverse as $venta) {
                        echo '<tr>
                      <td>' . $venta['sale_id'] . '</td>
                              <td>' . $venta['person_dni'] . '</td>
                              <td>' . $venta['person_name'], " ", $venta['person_lastname'] . '</td>
                              <td>' . $venta['sale_price'] . '</td>
                              <td>' . $venta['sale_date'] . '</td>
                              <td>
                                <a href="controller_detalle_ventas.php?id_venta=' . $venta['sale_id'] . '" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                              <a href="#" onclick="confirmarEliminarVenta(\'' . 'controller_eliminar_venta.php?id_venta=' . $venta['sale_id'] . '\')" class="btn btn-danger" id="desactivarVenta"><i class="fas fa-trash"></i></a>
                               

                              </td>
                            </tr>';
                      }
                    } else {
                      echo '<tr><td colspan="6">No hay ventas disponibles.</td></tr>';
                    }

                    // Cierra la tabla HTML

                    ?>


                  </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col">ID Venta</th>
                      <th scope="col">dni</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
  <!-- sweet alert -->
  <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

  <?php
  $mensaje_error = $mensaje_error ?? ''; // Asegura que $mensaje_editar esté definido
  $msj_eliminar = $msj_eliminar ?? ''; // Asegura que $mensaje_editar esté definido
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
          title: '<?php echo $msj_eliminar; ?>'

        })
      });
      $('.swalDefaultInfo').click(function() {
        Toast.fire({
          icon: 'info',
          title: '<?php echo $msj_eliminar; ?>'
        })
      });
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: '<?php echo $mensaje_error; ?>'
        })
      });
      $('.swalDefaultWarning').click(function() {
        Toast.fire({
          icon: 'warning',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
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

      <?php if (isset($msj_eliminar) && !empty($msj_eliminar)) : ?>
        // Simular un clic en el botón para activar el SweetAlert


        $('#btnInfo').click();



      <?php endif; ?>
      <?php if (isset($mensaje_error) && !empty($mensaje_error)) : ?>
        // Simular un clic en el botón para activar el SweetAlert


        $('#btnError').click();



      <?php endif; ?>
      // crear confirmacion con sweet alert al dar click en boton-eliminarVenta

    });
  </script>
  
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

  <script>
    // Función para confirmar la eliminación de un usuario
    function confirmarEliminarVenta(url) {
      Swal.fire({
        title: "¿Estás seguro de inactivar la venta?",
        text: "Esto podría restar las horas compradas",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, inactivar",
        cancelButtonText: "Cancelar",
        reverseButtons: true,
        dangerMode: true,
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }
  </script>
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