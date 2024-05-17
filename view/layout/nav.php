<style>
 .navbar {
  background: linear-gradient(to right, rgba(85, 236, 143, 0.5), rgba(85, 236, 143, 0.3));
  padding: 0px 30px 0px 10px !important;
  position: fixed !important;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000; /* Asegura que el menú esté por encima de otros elementos */
}
.nav-link {
  font-family: 'Arial', sans-serif; /* Cambia 'Arial' por la fuente que desees */
  color: black !important; /* Cambia '#333' por el color deseado */
}
 
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-light bg-white" >
    <a class="navbar-brand" href="#">
      <img style='max-width:107px;' src="<?php if(isset($ruta_inicio)){echo $ruta_inicio;}; ?>resource/img/inicio/edutech.svg" alt="logo-edutech" />
    </a>
    <button style='border:none;' class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php if(isset($ruta_inicio)){echo $ruta_inicio;}; ?>index.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php if(isset($ruta_inicio)){echo $ruta_inicio;} ?>controller/invitado/controller_cursos_inicio.php">CURSOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php if(isset($ruta_inicio)){echo $ruta_inicio;}; ?>view/quienes.php">NOSOTROS</a>

        </li>
        
        <li class="nav-item">
          <a href="<?php if(isset($ruta_inicio)){echo $ruta_inicio;}; ?>controller/login_controller.php" class="btn btn-warning btn-sm">INGRESAR</a>
        </li>
        <!-- <li class="nav-item">
          <a href="controller/signup_controller.php" class="btn btn-success btn-sm ">REGISTRARSE</a>
        </li> -->
       
      </ul>
    </div>
  </div>
</nav>

<script>
  document.querySelector('.navbar-toggler').addEventListener('click', function() {
    // Code to toggle the collapse class on the target element (e.g., "#templatemo_main_nav")
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



