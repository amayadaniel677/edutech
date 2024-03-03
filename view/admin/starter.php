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
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <!--VISTA BRAYAN INICIO ADMIN -->
  <link rel='stylesheet' href="../../resource/css/admin_vis/vista_admin.css">
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
  
  <!-- TODA LA PAGINA -->
  <div class="content-wrapper">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
    <div class="container mt-5">
    <h1 class="mb-4">Información de Sesión</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>DNI:</strong> <?php echo $_SESSION['dni_session']; ?></li>
        <li class="list-group-item"><strong>Nombre:</strong> <?php echo $_SESSION['name_session']; ?></li>
        <li class="list-group-item"><strong>Apellido:</strong> <?php echo $_SESSION['lastname_session']; ?></li>
        <li class="list-group-item"><strong>Tipo de DNI:</strong> <?php echo $_SESSION['dni_type_session']; ?></li>
        <li class="list-group-item"><strong>Teléfono:</strong> <?php echo $_SESSION['phone_session']; ?></li>
        <li class="list-group-item"><strong>Ciudad:</strong> <?php echo $_SESSION['city_session']; ?></li>
     
    </ul>
</div>
      <div class="container-fluid">
      
      <div class="row">
        <div class="container_1">
          <div class="card_1">
              <a class="card1" href="ventas/controller_ventas.php">
                  <img src="../../resource/img/admin_img/gener.png.png">
              </a>
              <div class="abajo">
                  <div>
                      <h5>
                          Gestionar ventas
                      </h5>
                      <p>
                          Registar, generar reporte,buscar.
                      </p>
                  </div>
                  <div>
                      <button type="button" id="bt1" class="botones"><a class='ingresarBtn' href="ventas/controller_ventas.php"><img src="../../resource/img/admin_img/ingresar.png" alt=""><br>Ingresar</a></button>
                  </div>
              </div>
          </div>
          <div class="card_2">
              <a class="card2" href="usuarios/controller_usuario.php">
                  <img src="../../resource/img/admin_img/User_Group_Monochromatic_2.2-removebg-preview.png">
              </a>

              <div>
                  <div class="abajo">
                      <div>
                          <h5>
                              Gestionar usuario
                          </h5>

                          <p>
                              Add usuario, modificar,eliminar.
                          </p>
                      </div>

                      <div>
                          <button type="button" id="bt2" class="botones"><a class='ingresarBtn' href="usuarios/controller_usuario.php"><img src="../../resource/img/admin_img/usuario.png" alt=""><br>Ingresar</a></button>
                      </div>
                  </div>

              </div>
          </div>

        </div>

        <div class="container_2">

            <div class="card_3">
                <a class="card3" href="pagos/controller_pagos.php">
                    <img src="../../resource/img/admin_img/Finance_app_Monochromatic_1preview (1).png">
                </a>

                <div class="abajo">
                    <div>
                        <h5>
                            Gestionar pagos
                        </h5>
                        <p>
                            Pagos pendientes, historial.        
                        </p>
                    </div>
                    <div>
                        <button type="button" id="bt3" class="botones"><a class='ingresarBtn' href="pagos/controller_pagos.php"><img src="../../resource/img/admin_img/pagos.png" alt=""><br>Ingresar</button></a>
                    </div>
                </div>

            </div>

            
            <div class="card_4">
                <a class="card4" href="cursos/controller_gestionar_cursos.php">
                    <img src="../../resource/img/admin_img/Campaign_2.png">
                </a>
                <div class="abajo">
                    <div>
                        <h5>
                            Gestionar cursos
                        </h5>
                        <p>
                            Modificar, agregar, eliminar...
                        </p>
                    </div>
                    <div>
                        <button type="button" id="bt4" class="botones"><a class='ingresarBtn' href="cursos/controller_gestionar_cursos.php"><img src="../../resource/img/admin_img/ingresar.png"
                            alt=""><br>Ingresar</button></a>
                    </div>
                </div>
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
  <?php include('layouts/footer.php'); ?>
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
