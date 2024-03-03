
<section class="content">
      <div class="container-fluid">
  
      <div class="row justify-content-center">
          <div class="col-md-7">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo $ruta_inicio . $_SESSION['photo_session']?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $_SESSION['name_session'].$_SESSION['lastname_session']; ?></h3>
                <p class=" text-muted text-center mb-0"><?php echo $_SESSION['dni_type_session'].': '.$_SESSION['dni_session']; ?></p>
                <p class="text-muted text-center"><?php echo $_SESSION['rol_session']; ?></p>

                

                <a href="editar_perfil.html" class="btn btn-success btn-block"><b>Editar perfil</b></a>
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