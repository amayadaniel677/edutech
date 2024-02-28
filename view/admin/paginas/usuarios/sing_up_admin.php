

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
    <section class="content">
      
      
    <div class="row-registro">
    

    
     
     <form action="">
     <div class="form-group">
                        <label for = "rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">
                        <?php
                          if($rol=='super_admin'){
                              echo "<option value='admin' > Administrador </option>";    //SOLO PUEDE CREARLO EL SUPERADMIN
                          }
                          ?>
                          <option value="docente" > Docente </option>
                          <option value="estudiante" > Estudiante </option>
                        </select>
                      </div>
        
       <div class="form-group">
       <label for="nombres">Nombres</label>
        <div class="input-group mb-3 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Name">
                </div>
       </div>
        <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                  </div>
                  <input type="text" id="apellidos" class="form-control" placeholder="Last name">
                </div>
        </div>
        
       
        <div class="form-group">
        <label for='tipo_documento'>Tipo de documento</label>
                        <select class="form-control" name="tipo_documento" id="tipo_documento">
                        <option value="CC"  >Cedula de ciudadania</option>
            <option value="TI" >tarjeta de identidad</option>
            <option value="CE" >Cedula de extranjeria</option>
                        </select>
                      </div>
        <div class="form-group">
        <label for="documento">Documento</label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                  </div>
                  <input type="text" id="documento" required class="form-control" placeholder="Identification number">
                </div>
        </div>
        <div class="form-group">
          <label for="sexo" class="">Sexo</label>
          <div>
            <input type="radio" value='M' id='sexo' name='sexo' >M
            
          <input type="radio" value='F' id='sexo' name='sexo' >F
          </div>
          

        </div>
        <div class="form-group">
        <label for="fecha">Fecha de nacimiento</label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                  </div>
                  <input type="date" id="fecha" required class="form-control" placeholder="Username">
                </div>
        </div>
        <div class="form-group">
        <label for="correo">correo electronico</label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input required type="email" id="correo" class="form-control" placeholder="Email">
                </div>
        </div>
        <div class="form-group">
        <label for="contrasenia">Contraseña</label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></i></span>
                  </div>
                  <input type="password" id="contrasenia" required class="form-control" placeholder="Password">
                </div>
        </div>
        
        <div class="form-group">
        <label for="conf-contraseña">Confirmar contraseña</label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                  </div>
                  <input type="password" id="confContrasenia" required class="form-control" placeholder="Password">
                </div>
        </div>
        <div class="form-group">
        <label for="telefono">Telefono</label>
        <div class="input-group mb-3 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></i></span>
                  </div>
                  <input type="number" id="telefono" required class="form-control" placeholder="Number">
                </div>
        </div>
        <div class="form-group">
        <label for="ciudad">Ciudad </label>
        <div class="input-group mb-3 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-building-user"></i></span>
                  </div>
                  <input type="text" id="ciudad" required class="form-control" placeholder="">
                </div>
        </div>
        <div class="form-group">
        <label for="direccion">Dirección </label>
        <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-compass"></i></span>
                  </div>
                  <input type="text" id="direccion" required class="form-control" placeholder="">
                </div>
        </div>
       
        
     </form>
      <button type="submit" class="btn btn-primary" id="btn-reg-user">CREAR CUENTA</button>
 
    </section>
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



