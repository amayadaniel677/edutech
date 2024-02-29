

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
      <div class="row">
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mis cursos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">lista de asistencia</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tutorias</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                     
                      <!-- /.user-block -->
                      <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                   
                                    <th style="width: 30%">
                                        Cursos Activos
                                    </th>
                                    <th style="width: 30%">
                                        Horario
                                    </th>
                                   
                                    <th style="width: 15%" class="text-left">
                                        Fecha Fin
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                      total de horas
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <td>
                                       <b> Matematicas</b>
                                    </td>
                                    <td>
                                        Juan Carlos Quintero
                                    </td>
                                    <td class="project_progress">
                                        21/02/2024
                                        
                                    </td>
                                    <td class="project-state">
                                        22/05/2024
                                    </td>
                                  
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <b>Literatura</b>
                                    </td>
                                    <td>
                                        vivian cobo
                                    </td>
                                    <td class="project_progress">
                                        05/08/2024
                                    </td>
                                    <td class="project-state">
                                        14/07/2024
                                    </td>
                                    
                                </tr>
                                <tr>
                                  
                                  <td>
                                     <b> Matematicas</b>
                                  </td>
                                  <td>
                                      Juan Carlos Quintero
                                  </td>
                                  <td class="project_progress">
                                      21/02/2024
                                      
                                  </td>
                                  <td class="project-state">
                                      22/05/2024
                                  </td>
                                 
                              </tr>
                              <tr>
                                
                                <td>
                                   <b> Matematicas</b>
                                </td>
                                <td>
                                    Juan Carlos Quintero
                                </td>
                                <td class="project_progress">
                                    21/02/2024
                                    
                                </td>
                                <td class="project-state">
                                    22/05/2024
                                </td>
                                
                            </tr>
                               
                            </tbody>
                        </table>
                      </div>

                     

                      
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        
                        
                      </div>
                      <!-- /.user-block -->
                      

                     
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        
                        
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                             
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                             
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                      
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                             
                              <th>Nombre tutoria </th>
                              <th>Fecha</th>
                              <th>hora</th>
                              <th style="width: 40px">Listado</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              
                              <td>Update software</td>
                              <td>12/07/2024</td>
                              <td>
                                
                              </td>
                              <td><a href="tu_enlace_aqui" style="display: flex; justify-content: center; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#187BF2" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a></td>
                            </tr>
                            <tr>
                             
                              <td>Clean database</td>
                              <td>12/07/2024</td>
                              <td>
                                
                              </td>
                              <td> <a href="tu_enlace_aqui" style="display: flex; justify-content: center; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#187BF2" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a></td>
                            </tr>
                            <tr>
                            
                              <td>Cron job running</td>
                              <td>12/07/2024</td>
                              <td>
                                
                              </td>
                              <td> <a href="tu_enlace_aqui" style="display: flex; justify-content: center; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#187BF2" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a></td>
                            </tr>
                            <tr>
                             
                              <td>Fix and squish bugs</td>
                              <td>12/07/2024</td>
                              <td>
                                
                              </td>
                              <td> <a href="Asistencia.html" style="display: flex; justify-content: center; align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#187BF2" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a>
                            </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div>
                      
                        
                     
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tutoria</label>
                        <div class="col-sm-10">
                          <select id="inputStatus" class="form-control custom-select">
                            <option >Batematicas basicas </option>
                            <option>Calculo I</option>
                    
                            <option selected>Algebra</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Fecha</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="inputEmail" placeholder="Fecha">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Hora </label>
                        <div class="col-sm-10">
                          <input type="time" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Temas a tratar</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                         
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Agregar tutoria </button>
                          
                        </div>
                        
                      </div>
                     
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
         
          <!-- /.col -->
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




