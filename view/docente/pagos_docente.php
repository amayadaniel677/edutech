

<?php 
$urlStarter='../../view/admin/';  //son desde el controlador
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
  <link rel="stylesheet" href="../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
    <link rel="stylesheet" href="../../resource/css/addProduct/agregarproducto.css" />
    <link rel="icon" href="../../resource/img/icons/logo-kepler-removebg-preview.png" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <?php include('../../view/layout/nav_top_docente.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->
  <?php include('../../view/layout/nav_aside_docente.php'); ?>
  <!-- Fin del Main Nav Asidebar Container -->
  
  <!-- TODA LA PAGINA -->
  <div class="content-wrapper">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pagos docente</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Perfil</a></li>
              <li class="breadcrumb-item active">Pagos docente</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content-header">
      
          
          <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#pagos" data-toggle="tab">Pagos </a></li>
                    <li class="nav-item"><a class="nav-link" href="#historial_pagos" data-toggle="tab">Historial de pagos</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="pagos">
                        <!-- Contenido de la pestaña Mis cursos -->
                        <div class="post">
                            <!-- Contenido del post -->
                        </div>
                        <div class="post">
                          <div class="col-6">
                            <p class="lead"> 2/22/2014</p>
          
                            <div class="table-responsive">
                              <table class="table">
                                <tbody><tr>
                                  <th style="width:80%">Último pago: </th>
                                  <td>$250.30</td>
                                </tr>
                                <tr>
                                  <th>pago por hora: </th>
                                  <td>$10.34</td>
                                </tr>
                                <tr>
                                  <th>Horas restantes:</th>
                                  <td>$5.80</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td>$265.24</td>
                                </tr>
                              </tbody></table>
                            </div>
                          </div>
                            <!-- Contenido del post -->
                        </div>
                        <!-- Otros posts si es necesario -->
                        
                    </div>
                    <!-- /.tab-pane -->
        
                    <div class="tab-pane" id="historial_pagos">
                        <!-- Contenido de la pestaña Lista de asistencia -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha de pago</th>
                                        <th>Precio por Hora</th>
                                        <th>Total Horas</th>
                                        <th>Precio Total</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    <!-- Filas de la tabla -->
                                    <tr>
                                        <td>Update software</td>
                                        <td>12/07/2024</td>
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    <!-- Otras filas si es necesario -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
       <!-- /.container-fluid -->
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
  <?php include('../../view/admin/layouts/footer.php'); ?>
  <!--FIN   Main Footer -->

</div> <!--fin de toda la pagina wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../view/admin/dist/js/adminlte.min.js"></script>
</body>
</html>




