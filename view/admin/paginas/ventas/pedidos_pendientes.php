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

  <title>EduTech | Pedidos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />
  <!-- CSS CURSOS ADMIN -->
  <!-- <link rel="stylesheet" href="../../../resource/css/sales/pedidos.css" /> -->

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
        <!-- informacion de pedidos -->
        <div class="card" style="overflow:scroll;">
          <div class="card-header">
            <h3 class="card-title">Listado de pedidos</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Cliente</th>
                  <th style="width: 60px">Fecha</th>
                  <th>Precio</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($pedidos) && !empty($pedidos)){
                  $n1 = 1;
                  var_dump($pedidos);
                  $pedidos = array_reverse($pedidos);
                  foreach ($pedidos as $fila) {
                    $id=$fila['id'];
                    echo '<tr>';
                    echo '<td>' . $n1 . '</td>';
                    echo '<td>' . htmlspecialchars($fila['student']) . '</td>';
                    echo '<td>' . date('d/m/Y', strtotime($fila['date'])) . '</td>';
                    echo '<td>$' . number_format($fila['price'], 2, '.', ',') . '</td>';
                    echo '<td>';
                    echo '<a href="controller_pedidos_pendientes.php?idVer=' . $id . '" class="btn btn-primary" data-toggle="modal" data-target="#modal-editar"><i class="bi bi-eye"></i></a>';
                    echo '<a href="controller_eliminar_pedidos.php?idEliminar=' . $id . '" class="btn btn-danger pedidos" id="btn-eliminar"><i class="bi bi-trash"></i></a>';// Botón para abrir el modal
                    include('../../../view/admin/paginas/ventas/modal_pedidos_pendientes.php');
                    echo '</td>';
                    echo '</tr>';
                    $n1 += 1;
                  }
  
                }

                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <li class="page-item"><a class="page-link" href="#">«</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
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

  <!-- alert eliminar pedido -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- alert eliminar pedido -->
  <!-- <script src="../../../resource/js/admin/ventas/alert_pedidos_pendientes.js"></script> -->
  <!-- jQuery -->
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Scripts de Bootstrap (asegúrate de tenerlos incluidos) -->
  <!-- AdminLTE App -->
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>