<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduTech | Registrar</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- SwadeetAlert2 -->
  <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../resource/css/users/signup_admin.css" />
  <!-- CSS CURSOS ADMIN -->
  <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
  <!-- css alertas mensajes -->
  <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
  <!-- necesario para el tamaño de mensajes alerta  -->

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
              <h1 class="m-0"> Registrar Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./controller_usuario.php">Gestionar usuarios</a>
                </li>
                <li class="breadcrumb-item active">Registrar usuario </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.fin titulo de la vista -->

      <!-- Contenido principal vista -->
      <section class="content">

        <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
          exito
        </button>
        <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
          info
        </button>
        <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">
          error
        </button>
        <div class="container-fluid">
          <h1 class="text-center display-8 mt-1">
            BIENVENIDO A KEPLER
          </h1>
          <div class="card-body" style="max-width: 900px; margin: 0 auto;">




            <form id='formSignup' action="" method="POST" enctype="multipart/form-data">
              <?php
              if (isset($_GET['mensaje'])) {
                $mensaje_info = $_GET['mensaje'];
              }
              ?>
              <?php if (isset($errores)) : ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Errores</h5>
                  <ul class="list-group list-group-flush pl-3">
                    <?php foreach ($errores as $error) : ?>
                      <li class=""><?php echo $error; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>

              <?php
              if (isset($mensaje_ok)) {
                echo "<div class='container mt-5'> 
      <div class='alert alert-success' role='alert'>";
                echo $mensaje_ok;
                echo "</div></div>";
              }

              function getFieldValue($field_name)
              {
                return isset($_POST[$field_name]) ? $_POST[$field_name] : '';
              }
              ?>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres" pattern="[a-zA-ZáàâäèéêëîíïôóöùûúüÿÀÂÄÈÉÊËÎÏÔÖÙÛÜŸ\s]+" value="<?php echo getFieldValue('nombres'); ?>" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" pattern="[a-zA-ZáàâäèéêëîíïôóöùûúüÿÀÂÄÈÉÊËÎÏÔÖÙÛÜŸ\s]+" value="<?php echo getFieldValue('apellidos'); ?>" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="tipo_documento">Tipo de documentos</label>
                    <div class="input-group mb-3">
                      <select class="form-control" id="tipo_documento" name="tipo_documento">
                        <option value="">Tipo de documento</option>
                        <option value="CC" <?php echo (getFieldValue('tipo_documento') == 'CC') ? 'selected' : ''; ?>>
                          Cédula de ciudadanía</option>
                        <option value="TI" <?php echo (getFieldValue('tipo_documento') == 'TI') ? 'selected' : ''; ?>>
                          Tarjeta de identidad</option>
                        <option value="CE" <?php echo (getFieldValue('tipo_documento') == 'CE') ? 'selected' : ''; ?>>
                          Cédula de extranjería</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="documento">Número de documento</label>
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" placeholder="Número de documento" id="documento" name="documento" pattern="\d{5,12}" minlength="5" maxlength="12" required value="<?php echo getFieldValue('documento'); ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" placeholder="Correo electrónico" id="correo" name="correo" required value="<?php echo getFieldValue('correo'); ?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <div class="input-group mb-3">
                      <input type="number" class="form-control" placeholder="Teléfono" id="telefono" name="telefono" pattern="\d{7,11}" minlength="7" maxlength="11" required value="<?php echo getFieldValue('telefono'); ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="contrasenia">Escribir contraseña</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Escribir contraseña" id="contrasenia" name="contrasenia" required value="<?php echo getFieldValue('contrasenia'); ?>" readonly>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="confContrasenia">Confirmar contraseña</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Confirmar contraseña" id="confContrasenia" name="confContrasenia" required value="<?php echo getFieldValue('confContrasenia'); ?>" readonly>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Ciudad" id="ciudad" name="ciudad" pattern="[a-zA-ZáàâäèéêëîíïôóöùûúüÿÀÂÄÈÉÊËÎÏÔÖÙÛÜŸ\s]+" required value="<?php echo getFieldValue('ciudad'); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Dirección" id="direccion" name="direccion" required value="<?php echo getFieldValue('direccion'); ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="rol">Seleccione un rol</label>
                <div class="input-group mb-3">
                  <select class="form-control" id="rol" name="rol">
                    <option value="">Seleccione un rol</option>

                    <option value="docente" <?php echo (getFieldValue('rol') == 'docente') ? 'selected' : ''; ?>>Docente
                    </option>
                    <option value="estudiante" <?php echo (getFieldValue('rol') == 'estudiante') ? 'selected' : ''; ?>>
                      Estudiante</option>
                    <?php if ($_SESSION['rol_session'] == 'superadmin') : ?>
                      <option value="administrador" id="rolAdministardor">Administrador</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for='foto'>Subir foto</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto" name="foto" accept='image/*'>
                    <label class="custom-file-label" for="foto">Elegir archivo</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for='sexo'>Sexo</label>
                    <div class="input-group mb-3">
                      <div>
                        <input type="radio" value="M" id="sexoM" name="sexo" <?php echo (getFieldValue('sexo') === 'M') ? 'checked' : ''; ?>>
                        <label for="sexoM">M</label>
                        <input type="radio" value="F" id="sexoF" name="sexo" <?php echo (getFieldValue('sexo') === 'F') ? 'checked' : ''; ?>>
                        <label for="sexoF">F</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for='fecha'>Fecha de Nacimiento</label>
                    <div class="input-group mb-3">
                      <input required type="date" class="form-control" placeholder="Fecha de nacimiento" id="fecha" name="fecha" value="<?php echo getFieldValue('fecha'); ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <button id='btn-reg-user' type="submit" class="btn btn-primary btn-block">Registrar</button>
                </div>
              </div>
            </form>

          </div>
        </div>
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

      <!--FIN   Main Footer -->

    </div>
    <!--footer-->
    <?php include('../../../view/admin/layouts/footer.php'); ?>

    <!--fin de toda la pagina wrapper -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Toastr -->
    <script src="../../../view/admin/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>

    <?php
    $mensaje_ok = $mensaje_ok ?? ''; // Asegura que $mensaje_editar esté definido
    $mensaje_info = $mensaje_info ?? ''; // Asegura que $mensaje_editar esté definido
    $mensaje_error = $mensaje_error ?? ''; // Asegura que $mensaje_editar esté definido
    ?>
    <script>
      $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 4000,
          width: '80%',
          customClass: {
            container: 'mi-clase-personalizada'
          }


        });

        $('.swalDefaultSuccess').click(function() {
          Toast.fire({
            icon: 'success',
            title: '<?php echo $mensaje_ok; ?>'

          })
        });
        $('.swalDefaultInfo').click(function() {
          Toast.fire({
            icon: 'info',
            title: '<?php echo $mensaje_info; ?>'
          })
        });
        $('.swalDefaultError').click(function() {
          Toast.fire({
            icon: 'error',
            title: '<?php echo $mensaje_error; ?>'
          })
        });
        $('.swalDefaultWarning').click(function() {
          Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultQuestion').click(function() {
          Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        // Verificar si la variable $mensaje_editar está definida
        <?php if (isset($mensaje_ok) && !empty($mensaje_ok)) : ?>
          // Simular un clic en el botón para activar el SweetAlert
          $('#btnSuccess').click();
        <?php endif; ?>
        <?php if (isset($mensaje_info) && !empty($mensaje_info)) : ?>
          // Simular un clic en el botón para activar el SweetAlert


          $('#btnInfo').click();



        <?php endif; ?>
        <?php if (isset($mensaje_error) && !empty($mensaje_error)) : ?>
          // Simular un clic en el botón para activar el SweetAlert

          $('#btnError').click();



        <?php endif; ?>
      });
    </script>
    <!-- <script>
function confirmarRegistro(event) {  
    event.preventDefault(); // Prevenir el comportamiento predeterminado del botón

    Swal.fire({
        title: '¿Estás seguro?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Registrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('formSignup').submit(); // Asegúrate de usar getElementById
        }
    });
}
</script> -->

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const rolSelect = document.getElementById('rol');
        const contraseniaInput = document.getElementById('contrasenia');
        const confContraseniaInput = document.getElementById('confContrasenia');

        rolSelect.addEventListener('change', function() {
          if (rolSelect.value === 'administrador') {
            contraseniaInput.removeAttribute('readonly');
            confContraseniaInput.removeAttribute('readonly');
          } else {
            contraseniaInput.setAttribute('readonly', true);
            confContraseniaInput.setAttribute('readonly', true);
            contraseniaInput.value = '';
            confContraseniaInput.value = '';
          }
        });
      });
    </script>
</body>

</html>