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

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="stylesheet" href="../../../resource/css/sales/buscar_ventas.css" />
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
    <div class="content-wrapper" style="height:auto;">
      <!-- Titulo de la vista -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Buscar ventas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Buscar venta</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">
        <div class="container-fluid">

          <div class="container">
            <?php
            if (isset($msj_eliminar)) {
              echo "<h5 class=' btn-danger text-white p-3 mb-2'>" . $msj_eliminar . "</h5>";
            }
            ?>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <form method="POST" action='controller_buscar_ventas.php'>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese el DNI">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Buscar</button>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST')
                      echo '<a href="controller_buscar_ventas.php" class="btn btn-outline-primary">Todas las ventas</a>'
                    ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- tabla -->
          <div class="container mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="miTabla" class="table table-striped table-bordered">
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
                    if ($ventas_paginadas) {
                      if ($bandera) {
                        $venta_reverse = array_reverse($ventas_paginadas);
                        foreach ($venta_reverse as $venta) {

                          echo '<tr>
                              <td>' . $venta['sale_id'] . '</td>
                              <td>' . $venta['person_dni'] . '</td>
                              <td>' . $venta['person_name'] . '</td>
                              <td>' . $venta['sale_price'] . '</td>
                              <td>' . $venta['sale_date'] . '</td>
                              <td>
                                <a href="controller_detalle_ventas.php?id_venta=' . $venta['sale_id'] . '" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="controller_eliminar_venta.php?id_venta=' . $venta['sale_id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>';
                        }
                      } else {
                        $ventas_reverse = array_reverse($ventas_paginadas);
                        foreach ($ventas_reverse as $venta) {
                          echo '<tr>
                      <td>' . $venta['sale_id'] . '</td>
                              <td>' . $venta['person_dni'] . '</td>
                              <td>' . $venta['person_name'] . '</td>
                              <td>' . $venta['sale_price'] . '</td>
                              <td>' . $venta['sale_date'] . '</td>
                              <td>
                                <a href="controller_detalle_ventas.php?id_venta=' . $venta['sale_id'] . '" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="controller_eliminar_venta.php?id_venta=' . $venta['sale_id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>';
                        }
                      }
                    } else {
                      echo '<tr><td colspan="6">No hay ventas disponibles.</td></tr>';
                    }

                    // Cierra la tabla HTML
                    echo '</tbody>
                        </table>';
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php if ($pagina > 1) : ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo ($pagina - 1); ?>">«</a></li>
                  <?php endif; ?>
                  <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                    <li class="page-item <?php echo ($pagina == $i) ? 'active' : ''; ?>"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php endfor; ?>
                  <?php if ($pagina < $total_paginas) : ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo ($pagina + 1); ?>">»</a></li>
                  <?php endif; ?>
                </ul>
              </div>
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
  <!-- AdminLTE App -->
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>