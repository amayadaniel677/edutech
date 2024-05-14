<?php
$ruta_inicio = '../../'; 
 
session_start(); //son desde el controlador
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
    <title>Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
    <!--VISTA BRAYAN INICIO ADMIN -->
    <link rel='stylesheet' href="../../resource/css/admin_vis/inicio_admin2.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('layouts/nav.php'); ?>
        <!-- /.navbar -->

        <!-- Main Nav Asidebar Container -->
        <?php include('layouts/nav_aside.php'); ?>
        <!-- Fin del Main Nav Asidebar Container -->
       <div class="content-wrapper">
        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manual de Ayudas </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $ruta_inicio;?>controller/admin/controller_inicio_admin.php">Inicio</a></li>
              <li class="breadcrumb-item active ">Manual de ayuda</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- TODA LA PAGINA -->
        <section class="content">
      <div  class="container-fluid"  style="max-width:1000px;">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Manual Para Administrador</h4>
              </div>
              <div class="card-body">
              <div class="row mt-4">
    <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist" style="">
            <a class="nav-item nav-link active" id="product-vent-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Ventas</a>
            <a class="nav-item nav-link" id="product-user-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Usuarios</a>
            <a class="nav-item nav-link" id="product-pagos-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Pagos</a>
            <a class="nav-item nav-link" id="product-areas-tab" data-toggle="tab" href="#product-price" role="tab" aria-controls="product-price" aria-selected="false">Areas</a>
            <a class="nav-item nav-link" id="product-cursos-tab" data-toggle="tab" href="#product-cursos" role="tab" aria-controls="product-cursos" aria-selected="false">Cursos</a>
        </div>
    </nav>
    <div class="tab-content col-md-7 p-5  " id="nav-tabContent">
        <div class="tab-pane fade show active " id="product-desc" role="tabpanel" aria-labelledby="product-user-tab">
          <h3>Manual de ventas</h3>
            <embed src="../../resource/pdf/normasISO2500.pdf" type="application/pdf" width="100%" height="600px;">
        </div>
        <div class="tab-pane fade mt-2" id="product-comments" role="tabpanel" aria-labelledby="product-user-tab">
          <h3>Manual de usuarios </h3>
            <embed src="../../resource/pdf/normasISO2500.pdf" type="application/pdf" width="100%" height="600px;">
        </div>
        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-pagos-tab">
          <h3> Manual de pagos</h3>
            <embed src="../../resource/pdf/normasISO2500.pdf" type="application/pdf" width="100%" height="600px;">
        </div>
        <div class="tab-pane fade" id="product-price" role="tabpanel" aria-labelledby="product-areas-tab">
          <h3> Manual de areas </h3>
            <embed src="../../resource/pdf/normasISO2500.pdf" type="application/pdf" width="100%" height="600px;">
        </div>
        <div class="tab-pane fade" id="product-cursos" role="tabpanel" aria-labelledby="product-cursos-tab">
          <h3>Manual de cursos</h3>
            <embed src="../../resource/pdf/normasISO2500.pdf" type="application/pdf" width="100%" height="600px;">
        </div>
    </div>
</div>

            </div>
                <div>
                 

              </div>
            </div>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    </div>

    
                 </div>
        
    <?php include('layouts/footer.php'); ?><!--fin de toda la pagina wrapper -->
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

















