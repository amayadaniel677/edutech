<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar secion</title>
    <link rel="stylesheet" href="../resource/css/login/login1.css">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <style>
        body {
            background-color: #f2f2f2; /* Gris pastel suave */
        }
    </style>
</head>
<body>
   
    <div class="log-container">
    <div class="cuenta-container">
     <h1>  <a href="../index.php" style="text-decoration: none; color: inherit;">
            <i class="fas fa-arrow-left"></i> <!-- Icono de flecha hacia atrás -->
            KEPLER <br> EDUCATION
            
        </a></h1>
     
     <div class="formulario">
     
     <div class="login-box">
     
  <!-- /.login-logo -->
  <div class="card">
  <div class=" d-flex justify-content-center mb-2 mt-4">
        <a href="" class="btn btn-secondary mr-2">Iniciar Sesión</a>
        <a href="../controller/signup_controller.php" class="btn btn-outline-secondary ">Registrarse</a>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Gracias por volver, ingresa tus credenciales. </p>

      <form action="" method="post">
        <!-- CAMBIAR ESTO POR SWEET ALERT PARA MANEJAR ERRORES -->
      <?php if(isset($errores)){
        foreach($errores as $error){
          echo "<p>".$error ."</p>";
        }
            
        } ?>
        <div class="input-group mb-3">
          <input type="number" id="dni" name="dni" required class="form-control" placeholder="Documento de identidad">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="contrasenia" name="contrasenia" required class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4 mb-3">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">Olvidé mi contraseña</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>   
    
</body>
</html>