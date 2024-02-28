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
    <link rel="stylesheet" href="../../../resource/css/cursos/agregar_curso.css" />
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
      <div class="container-fluid">
      
      <div class="row">
      
    <section class="cuerpo">
      <div class="formulario">
        <form action="#">
          <label for="nombre"
            >Nombre del curso<br />
            <input
              type="text"
              id="nombre"
              placeholder="Escriba aqui"
              class="input"
            />
          </label>
          <label for="categoria-curso"
            >Asignar Categoria <br />
            <select name="categoria-curso" id="categoria-curso" class="input">
              <option value="Matematicas">Matematicas </option>
              <option value="Artes">Artes </option>
              <option value="Talleres"> Talleres </option>
              <option value="Idiomas"> Idiomas </option>
              <option value="Otro"> Otro</option>
            </select>
          </label>
          <label for="docente"
            >Asignas docente <br />
            <select name="docente" id="docente" class="input">
              <option value="daniel">Daniel Amaya</option>
              <option value="martin">Brayan Martin</option>
              <option value="stich">Brayan Stich</option>
              <option value="stiven">Brayan Stiven</option>
              <option value="pedro">Pedro A Barrera</option>
            </select>
          </label>
          <label for="imagen"
            >Insertar Imagen  </br>
            <input type="file" class="btn btn-success"></input><br />
            
          </label>
          <label for="precio"
            >Precio hora<br />
            <input type="number" id="precio" value="15000" class="input" />
          </label>
          <label for="descripcion"
            >Descripcion del curso <br />
            <textarea
              name="descripcion"
              id="descripcion"
              placeholder="Escriba aqui"
            ></textarea>
          </label>
        </form>
      </div>
      <div class="imagen">
        <img src="../../../resource/img/adm_courses/agregar-cursos.png" alt="" />
      </div>
    </section>
    <div class='footer'>
      <div>
        <input type="submit" value="Agregar curso" class="btn btn-success" id="btn-add-curso"/>
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
<!-- alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- js alert -->
<script src="../../../resource/js/admin/cursos/alert_add_curso.js"> </script>

<!-- jQuery -->
<script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>
</html>




