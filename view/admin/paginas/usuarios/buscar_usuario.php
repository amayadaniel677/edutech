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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->
  <link rel="stylesheet" href="../../../resource/css/users/buscar_usuario1.css" />


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
              <h1 class="m-0">Buscar usuario</h1>
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

          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <form method="POST">
                  <div class="mb-3">
                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese el DNI">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Buscar</button>
                    <?php
                      if($_SERVER['REQUEST_METHOD'] === 'POST')
                      echo '<a href="controller_buscar_usuario.php" class="btn btn-outline-primary">Todas las ventas</a>'
                    ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- tabla -->
          <div class="container mt-5">
            <?php
              if($mensaje){
                echo $mensaje;
              }
            ?>
            <table id="miTabla" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">Rol</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Correo</th>
                  <th scope="col"># Documento</th>
                  <th scope="col">Ciudad</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($bandera){
                  header("Location: {$_SERVER['REQUEST_URI']}");
                    foreach ($buscar_usuario as $usuario) {
                      echo '<tr>';
                      echo '<td>' . $usuario['rol'] . '</td>';
                      echo '<td>' . $usuario['name'] . '</td>';
                      echo '<td>' . $usuario['lastname'] . '</td>';
                      echo '<td>' . $usuario['email'] . '</td>';
                      echo '<td>' . $usuario['dni'] . '</td>'; 
                      echo '<td>' . $usuario['city'] . '</td>';
                      echo '<td>' . $usuario['address'] . '</td>';
                      echo '<td>';
                      echo '<a href="#" class="btn btn-primary">';
                      echo '<i class="bi bi-eye"></i>';
                      echo '</a>';
                      echo '<a href="#" class="btn btn-danger">';
                      echo '<i class="bi bi-trash"></i>';
                      echo '</a>';
                      echo '</td>';
                      echo '</tr>';
                  }
                }else{
                    $usuarios_reverse=array_reverse($usuarios);
                    foreach ($usuarios_reverse as $usuario) {
                      echo '<tr>';
                      echo '<td>' . $usuario['rol'] . '</td>';
                      echo '<td>' . $usuario['name'] . '</td>';
                      echo '<td>' . $usuario['lastname'] . '</td>';
                      echo '<td>' . $usuario['email'] . '</td>';
                      echo '<td>' . $usuario['dni'] . '</td>'; 
                      echo '<td>' . $usuario['city'] . '</td>';
                      echo '<td>' . $usuario['address'] . '</td>';
                      echo '<td>';
                      echo '<a href="#" class="btn btn-primary">';
                      echo '<i class="bi bi-eye"></i>';
                      echo '</a>';
                      echo '<a href="#" class="btn btn-danger">';
                      echo '<i class="bi bi-trash"></i>';
                      echo '</a>';
                      echo '</td>';
                      echo '</tr>';
                  }
                } 
                
              
              echo '</tbody>';
              echo '</table>';
               ?>
              </tbody>
            </table>
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