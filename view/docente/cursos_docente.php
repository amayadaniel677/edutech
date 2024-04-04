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
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tutorias</a></li>

                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="get">
                        <!-- Post -->
                        <div class="card-body p-0">

                          <table class="table table-striped projects">
                            <thead>
                              <tr>
                                <th>ID Área</th>
                                <th>Nombre Área</th>
                                <th>Materia</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($areas_materias as $am) : ?>
                                <tr>
                                  <td><?= $am['area_id'] ?></td>
                                  <td><?= $am['area_nombre'] ?></td>
                                  <td><?= $am['materia_nombre'] ?></td>
                                </tr>
                              <?php endforeach; ?>
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
                              <?php if (isset($am['materia_nombre'])) { ?>
                                <?php foreach ($areas_materias as $am) { ?>



                                  <option><?= $am['materia_nombre'] ?></option>

                                <?php } ?>
                              <?php } else { ?>

                                <option>no existen materias </option>

                              <?php } ?>


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

                          <div class="container">
                            <div class="card card-success mt-4 ml-1 col-md-12">
                              <div class="col-12">
                                <div class="card">
                                  <div class="card-header">
                                    <h3 class="card-title">Registro de Estudiantes</h3>
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
                                  <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap mx-auto">
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

                                          <td>Mike Doe</td>
                                          <td>11-7-2014</td>
                                          <td><span class="tag tag-danger">Denied</span></td>
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

                                          <td>Jim Doe</td>
                                          <td>11-7-2014</td>
                                          <td><span class="tag tag-success">Approved</span></td>
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

                                          <td>Victoria Doe</td>
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

                                          <td>Michael Doe</td>
                                          <td>11-7-2014</td>
                                          <td><span class="tag tag-primary">Approved</span></td>
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

                                          <td>Rocky Doe</td>
                                          <td>11-7-2014</td>
                                          <td><span class="tag tag-danger">Denied</span></td>
                                          <td>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: 20px;">
                                              <label class="form-check-label" for="flexCheckDefault">
                                                Confirmar asistencia
                                              </label>
                                            </div>
                                          </td>
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
                            </div>
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