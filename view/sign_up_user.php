<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUTECH</title>
    <link rel="stylesheet" href="../resource/css/signUp/sign_up_admin.cs">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
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

<div class="card col-md-7 mx-auto mt-5">
<h1 class="text-center display-8 mt-3">
        <a href="../index.php" style="text-decoration: none; color: inherit;">
            <i class="fas fa-arrow-left"></i> <!-- Icono de flecha hacia atrás -->
            BIENVENIDO A KEPLER
        </a>
    </h1>
            <div class="card-body" style="max-width: 600px; margin: 0 auto;">
            
            <div class="registro-container d-flex justify-content-center mb-3">
        <a href="../controller/login_controller.php" class="btn btn-outline-secondary mr-2">Iniciar Sesión</a>
        <a href="#" class="btn btn-secondary ">Registrarse</a>
    </div>


                <form action="" method="POST" enctype="multipart/form-data">
                <?php 
                if(isset($msg)){
                    foreach($msg as $i){
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
            </div>
    
    <!-- Bootstrap 4 -->
    <script src="../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
