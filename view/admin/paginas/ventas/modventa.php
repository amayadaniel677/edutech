
<?php 
$urlStarter='../../../view/admin/';  //son desde el controlador
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
    <link rel="stylesheet" href="../../../resource/css/sales/modventa.css" /> <!-- este no se encuentra en las carpetas -->
    <link rel="stylesheet" href="../../../resource/css/addProduct/agregarproducto.css" /> <!-- se usa este como reemplazo, sacado de otra vista -->
    
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
            <h1 class="m-0">Agregar curso</h1>
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
      <div class="container-fluid" style="max-width:1000px;" >
      
      <div class="row">
      
      <div class="big-container">
        <div class="product-container">
            <h1>MODIFICAR VENTA</h1>
        </div>
        <div class="form">
            <div class="form__1">
            <form action="">
            <label for="nomcurso"><h3>Nombre del curso</h3></label>
            <input type="number" id="nomcurso" requerid>
            <label for="canthoras"><h3>Cantidad de horas</h3> </label>
            <input type="number" id="canthoras" requerid>
            <label for="costhora"><h3>Costo por hora</h3></label>
            <input type="number" id="costhora" required>
            <label for="id"> <h3>ID cliente</h3></label>
            <input type="number" id="id" required>
            <label for="fecha"><h3>Fecha </h3> </label>
            <input type="date" id="fecha" required>
             <div class="botones">
               <button type="submit">modificar</button>
               <button type="button" id="eliminar">eliminar venta</button>
            </div>
        </form>
        </div>
    </div>
        <div class="pagotarje">
            <img src="../../../resource/img/adm_ventas/modventa.png"" alt="">  <!-- este img no se encuentra en las carpetas -->
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




