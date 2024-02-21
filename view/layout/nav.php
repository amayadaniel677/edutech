<nav>
    <div><img src="<?php if(isset($urlResource)){echo $urlResource;}; ?>resource/img/inicio/edutech.svg" alt="logo-edutech" /></div>
    <div class="nav-contenedor-centro">
      <a href="<?php if(isset($urlView)){echo $urlView;}; ?>inicio.php">INICIO</a>
      <a href="<?php if(isset($urlView)){echo $urlView;}; ?>cursos.html">CURSOS</a>
      <a href="<?php if(isset($urlView)){echo $urlView;}; ?>quienes.php">EXPERIENCIA</a>
      <a href>CONTACTO</a>
    </div>
    <div class="nav-login">
      <a href="controller/login_controller.php" class="boton login">INICIAR</a>
      <a href="controller/signup_controller.php" class="boton login">REGISTRO</a>
    </div>
  </nav>