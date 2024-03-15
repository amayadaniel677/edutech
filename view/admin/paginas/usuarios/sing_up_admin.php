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
  <title>EduTech | Add Curso</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../resource/css/users/signup_admin.css" />
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
              <h1 class="m-0">Gestionar usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Gestionar usuario</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      
        <h1 class="text-center display-8 mt-1">
          BIENVENIDO A KEPLER
        </h1>
        <div class="card-body" style="max-width: 900px; margin: 0 auto;">




          <form action="" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($msg)) {
              foreach ($msg as $i) {
                echo "<h3>$i</h3>";
              }
            }


            ?>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <select class="form-control" id="tipo_documento" name="tipo_documento">
                    <option value="CC">Cédula de ciudadanía</option>
                    <option value="TI">Tarjeta de identidad</option>
                    <option value="CE">Cédula de extranjería</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" placeholder="Número de documento" id="documento" name="documento" required>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Correo electrónico" id="correo" name="correo" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="number" class="form-control" placeholder="Teléfono" id="telefono" name="telefono" required>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Contraseña" id="contrasenia" name="contrasenia" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Confirmar contraseña" id="confContrasenia" name="confContrasenia" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Ciudad" id="ciudad" name="ciudad" required>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion" required>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="input-group mb-3">
                <select class="form-control" id="rol" name="rol">
                  <option value="docente">Docente</option>
                  <option value="estudiante">Estudiante</option>
                </select>
              </div>
            </div>
            <label for='foto'>Subir foto:</label>
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="" id="foto" name="foto" accept='image/*'>
                <label class="custom-file-label" for="foto">Seleccionar archivo</label>

              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <label for='sexo'>Sexo:</label>
                <div class="input-group mb-3">
                  <div>
                    <input type="radio" value="M" id="sexoM" name="sexo">
                    <label for="sexoM">M</label>
                    <input type="radio" value="F" id="sexoF" name="sexo">
                    <label for="sexoF">F</label>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <label for='fecha'>Fecha de Nacimiento</label>
                <div class="input-group mb-3">

                  <input type="date" class="form-control" placeholder="Fecha de nacimiento" id="fecha" name="fecha" required>
                </div>
              </div>
            </div>

            <!-- Resto de los campos aquí... -->

            <div class="row">

              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
              </div>
            </div>
          </form>



        </div>
     
      <!-- /. Maincontent -->
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
    <script src="../../../resource/js/admin/ventas/alert_registrar_usuario.js"> </script>
    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>