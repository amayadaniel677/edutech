<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUTECH</title>
    <link rel="stylesheet" href="../resource/css/signUp/sign_up_admin.css">
</head>
<body>
    <div class="log-container">
    <div class="cuenta-container">
     <h1> <a href="../index.php"> <img src="../resource/img/updatesale_login_signup/LOGOLOGIN.png" alt=""></a> Crea tu cuenta</h1>
     <div class="registro-container">
      <a href="../controller/login_controller.php" >iniciar sesion</a>
      <a href="">Registrate</a>
     </div>
     
     <div class="formulario">
     <form action="" method='POST'>
        <?php 
        if(isset($msg)){
            foreach($msg as $i){
                echo "<h3>$i</h3>";
            }
        }
        
        
        ?>
        <label for="nombres">Nombres</label>
        <input type="text" id="nombres" name="nombres">
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <label for='tipo_documento'>Tipo de documento</label>
        <select name="tipo_documento" id="tipo_documento">
            <option value="CC"  >Cedula de ciudadania</option>
            <option value="TI" >tarjeta de identidad</option>
            <option value="CE" >Cedula de extranjeria</option>
        </select>
        <label for="documento">Número de documento</label>
        <input type="number" id="documento" name="documento"  required>
        <label for="sexo">Sexo</label>
        <input type="radio" value='M' id='sexo' name='sexo' >M
        <input type="radio" value='F' id='sexo' name='sexo' >F
        <label for="fecha">Fecha de nacimiento</label>
        <input type="date" id="fecha" name="fecha" required>
        <label for="correo">correo electronico</label>
        <input type="email" id="correo" name="correo" required>
        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" required>
        <label for="conf-contraseña">Confirmar contraseña</label>
        <input type="password" id="confContrasenia" name="confContrasenia" required>
        <label for="telefono">Telefono</label>
        <input type="number" id="telefono" name="telefono" required>
        <label for="ciudad">Ciudad </label>
        <input type="text" id="ciudad" name="ciudad" required>
        <label for="direccion">Dirección </label>
        <input type="text" id="direccion" name="direccion" required>
        
        <button type="submit"> CREAR CUENTA</button>
     </form>
    </div>
    </div>
 <div class="image">
        <img src="../resource/img/updatesale_login_signup/imagenlogin.png" alt="">
 </div>


    </div>
    
</body>
</html>