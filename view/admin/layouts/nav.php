  <head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  </head>

  <body>
     <!-- jQuery -->
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Your content -->
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script> -->
  </body>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php if (isset($ruta_inicio)) {
                    echo $ruta_inicio;
                  } ?>controller/admin/controller_inicio_admin.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php if (isset($ruta_inicio)) {
                    echo $ruta_inicio;
                  } ?>controller/admin/cursos/controller_catalogo_cursos.php" class="nav-link">Catalogo</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php if (isset($ruta_inicio)) {
                    echo $ruta_inicio;
                  } ?>controller/admin/usuarios/controller_usuario.php" class="nav-link">Usuarios</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php if (isset($ruta_inicio)) {
                    echo $ruta_inicio;
                  } ?>controller/admin/pagos/controller_pagos.php" class="nav-link">Pagos</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->



      <!-- cerrar sesion Dropdown Menu -->
      <li class="nav-item dropdown">
        <a id="tooltipDropdown" class="nav-link" style="color: rgb(5 151 187 / 100%);" data-toggle="dropdown" href="#" aria-expanded="true" title="Usuario">
          <i class="fas fa-user-circle"></i>
        </a>
        <script>
          $(document).ready(function() {
            $('#tooltipDropdown').tooltip({
              placement: 'bottom'
            });
          });
        </script>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo $ruta_inicio . $_SESSION['photo_session']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $_SESSION['name_session'] ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">ADMIN</p>
                <p class="text-sm">Activo</p>

              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>editar perfil
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="<?php echo $ruta_inicio . 'controller/controller_cerrar_sesion.php?clickcerrar=' . urlencode(true); ?>" onclick="" class="dropdown-item dropdown-footer">Cerrar sesión</a>

        </div>
      </li>
      <!-- Notifications Dropdown Menu -->


      <li class="nav-item">
        <a class="nav-link" href="<?php if (isset($ruta_inicio)) {
                                    echo $ruta_inicio;
                                  } ?>view/admin/manual_ayudas.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Manual de Ayudas">
          <i class="fas fa-question-circle"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php if (isset($ruta_inicio)) {
                                    echo $ruta_inicio;
                                  } ?>controller/admin/backup_restore/controller_backup.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Copia de seguridad">
          <i class="fas fa-save"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="Maximizar">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
    <script>
      $(function() {
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

  </nav>