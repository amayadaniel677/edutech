<section class="content">
  <div class="container-fluid">
    <div class="errores">
   
   
              <?php
              if (isset($_GET['mensaje'])) {
                echo " <div class='container mt-5'> <div class='alert alert-danger' role='alert'>";
                $mensaje_recibido = $_GET['mensaje'];
                echo $mensaje_recibido;
                echo " </div>  </div>";
            }
              ?>
           

      <?php

      // Verifica si hay un mensaje de éxito en la sesión
      if (isset($_SESSION['update-succes'])) {
        echo '<div class="alert alert-success mt-3" role="alert">';
        echo $_SESSION['update-succes'];
        echo '</div>';
        // Limpia la variable de sesión después de mostrar el mensaje
        unset($_SESSION['update-succes']);
      }
      // Verifica si hay errores en la sesión
      if (isset($_SESSION['errores_foto']) || isset($_SESSION['errores_inputs'])) {
        echo "<div class='alert alert-danger mt-3'>";

        // Muestra errores de la foto
        if (!empty($_SESSION['errores_foto'])) {
          echo "<strong>Errores en la foto:</strong><br>";
          foreach ($_SESSION['errores_foto'] as $error) {
            echo $error . "<br>";
          }
        }

        // Muestra errores de los inputs
        if (!empty($_SESSION['errores_inputs'])) {
          echo "<strong>Errores:</strong><br>";
          foreach ($_SESSION['errores_inputs'] as $errors) {
            echo $errors . "<br>";
          }
        }

        echo "</div>";

        // Limpia las variables de sesión después de mostrar los errores
        unset($_SESSION['errores_foto']);
        unset($_SESSION['errores_inputs']);
      }
      ?>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-7">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo $ruta_inicio . $_SESSION['photo_session'] ?>" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?php echo $_SESSION['name_session'] . $_SESSION['lastname_session']; ?></h3>
            <p class=" text-muted text-center mb-0"><?php echo $_SESSION['dni_type_session'] . ': ' . $_SESSION['dni_session']; ?></p>
            <p class="text-muted text-center"><?php echo $_SESSION['rol_session']; ?></p>


            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-datos">
              Editar perfil
            </button>
            <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#modal-password">
              Cambiar contraseña
            </button>
            <!-- ACA EMPIEZA EL MODAL EDITAR PERFILCERRADO -->
            <div class="modal" id="modal-datos">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Encabezado del Modal -->
                  <div class="modal-header">
                    <h4 class="modal-title">Datos Básicos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Cuerpo del Modal -->
                  <div class="modal-body">
                    <form action="<?php echo $ruta_inicio ?>controller/controller_actualizar_usuario.php" method="post" id="datosForm" enctype="multipart/form-data">
                      <!-- ESTE INPUT ESTÁ OCULTO -->
                      <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $_SESSION['dni_session']; ?>" style="display: none;">
                      <input type="text" class="form-control" id="old-photo" name="old-photo" value="<?php echo $_SESSION['photo_session']; ?>" style="display: none;">
                      <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $_SESSION['rol_session']; ?>" style="display: none;">
                      <!-- ESTE INPUT ESTÁ OCULTO -->
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $_SESSION['name_session']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastname">Apellido</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido" value="<?php echo $_SESSION['lastname_session']; ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="city">Ciudad</label>
                          <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" value="<?php echo $_SESSION['city_session']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="phone">Teléfono</label>
                          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="<?php echo $_SESSION['phone_session']; ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="email">Correo Electrónico</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="<?php echo $_SESSION['email_session']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="birthdate">Fecha de Nacimiento</label>
                          <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $_SESSION['birthdate_session']; ?>">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="address">Dirección</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Dirección" value="<?php echo $_SESSION['name_session']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="dni_type">Tipo de Documento</label>
                          <select class="form-control" id="dni_type" name="dni_type">
                            <option value="CC" <?php echo ($_SESSION['dni_type_session'] == 'CC') ? 'selected' : ''; ?>>Cédula Ciudadanía</option>
                            <option value="TI" <?php echo ($_SESSION['dni_type_session'] == 'TI') ? 'selected' : ''; ?>>Tarjeta de identidad</option>
                            <option value="RC" <?php echo ($_SESSION['dni_type_session'] == 'RC') ? 'selected' : ''; ?>>Registro Civil</option>
                            <option value="CE" <?php echo ($_SESSION['dni_type_session'] == 'CE') ? 'selected' : ''; ?>>Cedula de extranjería</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="photo">Foto</label>
                          <img src="<?php echo $ruta_inicio . $_SESSION['photo_session']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle mb-2 d-block">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="new-photo" name="new-photo">
                            <label class="custom-file-label" for="photo">Seleccionar archivo</label>
                          </div>
                        </div>
                      </div>

                      <!-- Pie del Modal -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="submit_form_1" onclick="confirmarActualizacion()">Guardar cambios</button>
                      </div>
                    </form>
                    <script>
                      function confirmarActualizacion() {
                        Swal.fire({
                          title: '¿Estás seguro?',
                          text: '¿Quieres actualizar tus datos?',
                          icon: 'question',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Sí, actualizar',
                          cancelButtonText: 'Cancelar'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            // Si el usuario confirma, envía el formulario
                            document.getElementById('datosForm').submit();
                          }
                        });
                      }
                    </script>
                  </div>



                </div>
              </div>
            </div>

            <!-- ACA TERMINA EL MODAL CERRADO -->
            <!-- ACA EMPIEZA EL MODAL CONTRASEÑA -->
            <div class="modal" id="modal-password">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Encabezado del Modal -->
                  <div class="modal-header">
                    <h4 class="modal-title">Cambiar contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Cuerpo del Modal -->
                  <div class="modal-body">
                    <form action="<?php echo $ruta_inicio ?>controller/controller_actualizar_usuario.php" method="post" id="passwordForm" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" id="dni" name="dni" value="<?php echo $_SESSION['dni_session']; ?>" style="display: none;">
                      <input type="hidden" class="form-control" id="rol" name="rol" value="<?php echo $_SESSION['rol_session']; ?>" style="display: none;">
                      <input type="hidden" class="form-control" id="password-session" name="password-session" value="<?php echo $_SESSION['password_session']; ?>" style="display: none;">


                      <!-- /.login-logo -->
                      <div class="card">
                        <div class="card-body login-card-body">
                          <p class="login-box-msg">Recuerda tu contraseña para ingresar la proxima vez!</p>


                          <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña actual" id='current-password' name='current-password' style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" id='new-password' name='new-password' placeholder="Contraseña nueva" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" id='confirm-new-password' name='confirm-new-password' placeholder="Confirmar nueva contraseña" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.login-card-body -->
                      </div>


                      <!-- Pie del Modal -->
                      <div class="modal-footer">
                        <input type="hidden" name="form_id" value="formulario1">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" name="submit_form_2" onclick="confirmarContraseña()">Guardar cambios</button>
                      </div>
                    </form>
                    <script>
                      function confirmarContraseña() {
                        Swal.fire({
                          title: '¿Estás seguro?',
                          text: '¿Quieres actualizar tu contraseña?',
                          icon: 'question',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Sí, actualizar',
                          cancelButtonText: 'Cancelar'
                        }).then((result) => {
                          if (result.isConfirmed) {
                            // Si el usuario confirma, envía el formulario
                            document.getElementById('passwordForm').submit();
                          }
                        });
                      }
                    </script>
                  </div>



                </div>
              </div>
            </div>

            <!-- ACA TERMINA EL MODAL CERRADO -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Informacion Personal</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicacion</strong>

            <p class="text-muted"><?php echo  $_SESSION['city_session']; ?></p>

            <hr>


            <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>

            <p class="text-muted"><?php echo $_SESSION['address_session']; ?></p>




            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Telefono</strong>

            <p class="text-muted"><?php echo $_SESSION['phone_session']; ?></p>

            <hr>


            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> correo</strong>

            <p class="text-muted"><?php echo $_SESSION['email_session']; ?></p>

            <hr>




          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <!-- /.col -->
    </div>

  </div>

</section>