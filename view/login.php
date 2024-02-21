<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar secion</title>
    <link rel="stylesheet" href="../resource/css/login/login.css">
    
</head>
<body>
   
    <div class="log-container">
    <div class="cuenta-container">
     <h1> <a href="../index.php"> <img src="../resource/img/updatesale_login_signup/LOGOLOGIN.png" alt=""> </a> KEPLER <br> EDUCATION</h1>
     <h3>Gracias por volver!</h3>
     <div class="registro-container">
        
      <a href="" >iniciar sesion</a>
      <a rel="stylesheet" href="../controller/signup_controller.php">Registrate</a>

     </div>
     <div class="formulario">
     <form action="" method='POST'>
        <?php if(isset($mensaje)){
            echo "<h3>$mensaje </h3>";
        } ?>
        <label for="dni">Documento de identidad</label>
        <input type="number" id="dni" name="dni" required>
        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" required>
        <a href=""> Olvidaste tu contraseña?</a>
        <button type="submit" id='submit_login' name='submit_login'> LOGIN</button>

     </form>
    </div>
    </div>
 <div class="image">
        <img src="../resource/img/updatesale_login_signup/computo.png" alt="">
 </div>


    </div>
    
</body>
</html>