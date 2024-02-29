

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
            <h1 class="m-0">Agregar producto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agregar producto</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
      <div class="container-fluid">
   
         
      <div class="card card-success">
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Registro de Estudiantes </h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 400px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        
                        <th>Estudiante</th>
                        <th>Tutoria</th>
                        <th>Fecha</th>
                        <th>Asistencia</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-success">Approved</span></td>
                        <td> <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                          <label class="form-check-label" for="flexCheckDefault">
                            Confirmar asistencia
                          </label>
                          </div></td>
                      </tr>
                      <tr>
                        
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-warning">Pending</span></td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                            <label class="form-check-label" for="flexCheckDefault">
                              Confirmar asistencia
                            </label>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        
                        <td>Bob Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-primary">Approved</span></td>
                        <td> <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                          <label class="form-check-label" for="flexCheckDefault">
                            Confirmar asistencia
                          </label>
                          </div></td>
                      </tr>
                      <tr>
                        
                        <td>Mike Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-danger">Denied</span></td>
                        <td><div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                            <label class="form-check-label" for="flexCheckDefault">
                              Confirmar asistencia
                            </label>
                            </div></td>
                      </tr>
                      <tr>
                        
                        <td>Jim Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-success">Approved</span></td>
                        <td> <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                          <label class="form-check-label" for="flexCheckDefault">
                            Confirmar asistencia
                          </label>
                          </div></td>
                      </tr>
                      <tr>
                        
                        <td>Victoria Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-warning">Pending</span></td>
                        <td> <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                          <label class="form-check-label" for="flexCheckDefault">
                            Confirmar asistencia
                          </label>
                          </div></td>
                      </tr>
                      <tr>
                        
                        <td>Michael Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-primary">Approved</span></td>
                        <td> <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                          <label class="form-check-label" for="flexCheckDefault">
                            Confirmar asistencia
                          </label>
                          </div></td>
                      </tr>
                      <tr>
                        
                        <td>Rocky Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-danger">Denied</span></td>
                        <td> <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                          <label class="form-check-label" for="flexCheckDefault">
                            Confirmar asistencia
                          </label>
                          </div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <button type="button" class="btn btn-primary float-left mb-3 ml-3">VOLVER</button>
              <button type="button" class="btn btn-success float-right mb-3 mr-3">GUARDAR</button>
            </div>
          <!-- /.card -->
        </div>
          <!-- /.col -->
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




