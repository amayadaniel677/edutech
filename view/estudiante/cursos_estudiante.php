

<?php 
$urlStarter='../../view/admin/'; 
 //son desde el controlador
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduTech | Add Curso</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../view/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../view/admin/dist/css/adminlte.min.css">
  <!-- CSS CURSOS ADMIN -->

    <link rel="icon" href="../../resource/img/icons/logo-kepler-removebg-preview.png" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

   <!-- Navbar -->
   <?php include('../../view/layout/nav_top_estudiante.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->
  <?php include('../../view/layout/nav_aside_estudiante.php'); ?>
  <script>
    function agregarHoras(nombreCurso, horas) {
        // Realizar una solicitud AJAX al servidor
        $.ajax({
            type: "POST",
            url: "../../controller/estudiante/controller_carrito_compras.php",
            data: { nombre_curso: nombreCurso, horas: horas },
            dataType: 'json',
            success: function(data) {
                // Actualizar la tabla con los datos actualizados recibidos del servidor
                if (data) {
                    // Encontrar la fila correspondiente al curso
                    var filaCurso = $('tr').filter(function() {
                        return $(this).find('td:first').text() === nombreCurso;
                    });

                    // Actualizar el número de horas en la fila
                    filaCurso.find('td:nth-child(3)').text(data.hours);
                }

                // Mostrar mensaje de éxito o error si lo hay
                if (data.success_message) {
                    alert(data.success_message);
                } else if (data.error_message) {
                    alert(data.error_message);
                }
            },
            error: function(xhr, status, error) {
                // Manejar el error de la solicitud AJAX
                alert("Error al agregar horas: " + error);
            }
        });
    }
</script>

  <!-- Fin del Main Nav Asidebar Container -->
  
  <!-- TODA LA PAGINA -->
  <div class="content-wrapper">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel Principal </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Agregar producto</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
   
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> EDUTECH
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                  <button type="button" class="btn btn-success float-right" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                  </svg> Editar</button>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; ?>
            </div>
            <?php unset($_SESSION['error_message']); // Limpiar el mensaje de error después de mostrarlo ?>
        <?php endif; ?>
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                
                  <address>
                    <h3> <?php echo $_SESSION['name_session'] ?></h3>
                   <b>CC :</b> <?php echo $_SESSION['dni_session'] ?><br>
                    <b>Lugar de residencia: </b><?php echo $_SESSION['address_session'] ?><br>
                    <b>telefono:</b><?php echo $_SESSION['phone_session'] ?><br>
                    <b> Email:</b> <?php echo $_SESSION['email_session'] ?>
                  </address>
    
                </div>
               
              </div>
              
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-10 table-responsive">
                <table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre Curso</th>
            <th>Precio</th>
            <th>Total Horas </th>
            <th> Comprar mas Horas</th>
        </tr>
    </thead>
    <tbody>
        <?php if( isset($orden_cursos_activos)) : ?>
            <?php foreach($orden_cursos_activos as $curso_act): ?>
                <tr>
                    <td><?php echo $curso_act['name_subject']; ?></td>
                    <td><?php echo $curso_act['price']; ?></td>
                    <td><?php echo isset($datos_curso_activo[$curso_act['name_subject']]) ? $datos_curso_activo[$curso_act['name_subject']]['hours'] : $curso_act['hours']; ?></td>
                    <td>
    <button type="button" class="btn btn-primary float-center" style="margin-left: 5px;" onclick="agregarHoras('<?php echo $curso_act['name_subject']; ?>', <?php echo $curso_act['hours']; ?>)">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg>
    </button>
</td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <h2> No hay cursos activos  </h2>
        <?php endif; ?>
    </tbody>
</table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
              
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
            
                <div class="col-12">
                    
                  <button type="button" class="btn btn-success float-right" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                  </svg>
                  
                  <a href="historial_cursos.html" style="color:white;">Historial de cursos</a>
                   
                  </button>
                 
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
    
</div>
<!-- Modal para agregar horas -->
<div class="modal fade" id="comprarhoras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Contenido del modal -->
    <form id="formAgregarHoras" method="POST">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <!-- Contenido del formulario -->
            <div class="modal-content">
                <!-- Cabecera del modal -->
                <div class="modal-header">
                    <!-- Contenido de la cabecera -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Agregar Horas</h3>
                            <div class="card-tools">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <!-- Contenido del cuerpo -->
                    <div class="form-group">
                        <label for="inputName">Nombre del curso</label>
                        <input type="text" id="inputName" class="form-control" name="nombre_curso" style="width: 100%; text-align: center;" placeholder="Ingrese el nombre del curso">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Cantidad de horas:</label>
                        <input id="inputDescription" class="form-control" type="number" style="width: 100%; text-align: center;" placeholder="Ingrese la cantidad de horas" name="horas">
                    </div>
                </div>
                <!-- Pie del modal -->
                <div class="modal-footer">
                    <!-- Contenido del pie -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Comprar</button>
                </div>
            </div>
        </div>
    </form>
</div>




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
  <?php include('../../view/admin/layouts/footer.php'); ?>
  <!--FIN   Main Footer -->

</div> <!--fin de toda la pagina wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../view/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../view/admin/dist/js/adminlte.min.js"></script>


</body>
</html>




