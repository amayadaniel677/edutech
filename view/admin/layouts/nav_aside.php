<?php  ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php if(isset($urlStarter)){echo $urlStarter;};?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EduTech</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $ruta_inicio . $_SESSION['photo_session'] ;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php if(isset($ruta_inicio)){echo $ruta_inicio;}; ?>controller/admin/perfil/controller_perfil_admin.php" class="d-block"> <?php echo $_SESSION['name_session']; ?> </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               <li class="nav-item">
            <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/controller_inicio_admin.php" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
      
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/ventas/controller_regventa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/ventas/controller_reporte_venta.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/ventas/controller_buscar_ventas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buscar</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/ventas/controller_pedidos_pendientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pedidos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/usuarios/controller_sing_up_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/usuarios/controller_buscar_usuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buscar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pagos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
              <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/pagos/controller_pagos_pendientes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/pagos/controller_pagos_historial.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Cursos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
              <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/cursos/controller_agregar_cursos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/cursos/controller_modificar_cursos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modificar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/cursos/controller_catalogo_cursos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catalogo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Areas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
              <a href="<?php if(isset($urlStarter)){echo $urlStarter;}; ?>../../controller/admin/areas/controller_agregar_area.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agregar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/areas/controller_vincular_docente.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vincular docente</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if(isset($urlStarter)){echo $urlStarter;};?>../../controller/admin/areas/controller_buscar_area.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buscar area</p>
                </a>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
