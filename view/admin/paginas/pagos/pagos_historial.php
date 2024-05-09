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
<!-- FUENTES PARA LAS TABLAS Y BARRA BUSQUEDA -->
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../view/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../../view/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- CSS CURSOS ADMIN -->
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
            <h1 class="m-0">Historial de pagos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Historial</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
      <div class="container-fluid"  style="max-width:1000px;" >
      <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>Filtrar docentes</label>
              <select class="form-control" style="width: 100%;">
                <option value="Docente ">Seleccione </option>
                <option value="Docente ">Docente 1 </option>
                <option value="Docente ">Docente 2</option>
                <option value="Docente ">Docente 3</option>
                <option value="Docente ">Docente 4</option>
                <option value="Docente ">Docente 5</option>
                <option value="Docente ">Docente 6</option>
                <option value="Docente ">Docente 7</option>
              </select>
              <br>
              <button type="button" class="btn btn-primary" id='filtrar' name='filtrar'>Filtrar</button>
            </div>
           
          </div>
          
        </div>
      <div class="row">
     
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Reporte de pagos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow-x:scroll;">
             
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Docente</th>
                      <th>Fecha pago</th>
                      <th>Horas pagadas</th>
                      <th>Valor hora</th>
                      <th style="width: 40px">Valor Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Vivian Covo</td>
                      <td>22-10-2023</td>
                      <td>
                        50
                      </td>
                      <td>10000</td>
                      <td><span class="badge bg-danger">1000000</span></td> 
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Vivian Covo</td>
                      <td>22-10-2023</td>
                      <td>
                        50
                      </td>
                      <td>10000</td>
                      <td><span class="badge bg-warning">450000</span></td> 
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Vivian Covo</td>
                      <td>22-10-2023</td>
                      <td>
                        50
                      </td>
                      <td>10000</td>
                      <td><span class="badge bg-success">100000</span></td> 
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Vivian Covo</td>
                      <td>22-10-2023</td>
                      <td>
                        50
                      </td>
                      <td>10000</td>
                      <td><span class="badge bg-primary">0</span></td> 
                    </tr>
                    
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
<!-- Select2 -->
<script src="../../../view/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../view/admin/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>

</body>
</html>




