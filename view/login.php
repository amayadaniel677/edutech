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
    
    <link rel="stylesheet" href="../view/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../view/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../view/admin/dist/css/adminlte.min.css">

    <style>
        body {
            background-color: #f2f2f2; /* Gris pastel suave */
        }
    </style>
</head>
<body>
   
    <div class="log-container">
    <div class="cuenta-container">
     <h1>   <!-- Icono de flecha hacia atrás -->
            KEPLER <br> EDUCATION
            
        </h1>
     
     <div class="formulario">
     
     <div class="login-box">
     
  <!-- /.login-logo -->
  <div class="card">
  <div class=" d-flex justify-content-center mb-2 mt-4">
        <h3> LOGIN </h3>
        
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Gracias por volver, ingresa tus credenciales. </p>

      <form action="" method="post">
        <!-- CAMBIAR ESTO POR SWEET ALERT PARA MANEJAR ERRORES -->
      <?php if(isset($errores)){
        foreach($errores as $error){
          echo '<div class="alert alert-danger">' . urldecode($error) . '</div>';
        }
            
        } ?>
      <?php if(isset($_GET['mensaje'])){
        $mensaje = urldecode($_GET['mensaje']);
        echo '<div class="alert alert-info">' . $mensaje . '</div>';
      }    
        ?>
               <?php
// Decodificar el mensaje de la URL
if (isset($_GET['message'])) {
  $message = urldecode($_GET['message']);
  echo '<div class="alert alert-success">' . $mensaje . '</div>';
}
?>
        <?php
    if (isset($_GET['success'])) {
        echo $_GET['success'];
    }
?>

        
            
        
        <div class="input-group mb-3">
          <input type="number" id="dni" name="dni" required class="form-control" placeholder="Documento de identidad">
          <div class="input-group-append">
            <div class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
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
        <div class="row justify-content-between">
          <div class="col-5 mb-3">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <div class="col-5 mb-3 text-right">
            <a href="../index.php" class="btn btn-success btn-block" style="text-decoration: none; color:white;">Volver</a>
          </div>
        </div>
      
      </form>

      <p class="mb-1">
        <a href="recuperar_password/recuperar_controller.php">Olvidé mi contraseña</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>   
    
</body>
</html>