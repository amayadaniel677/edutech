

<?php 
$urlStarter='../../view/admin/';  //son desde el controlador
session_start();
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
    <link rel="stylesheet" href="../../resource/css/cursos/descripcion_curso.css">
    
   
</head>



<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('../../view/layout/nav.php'); ?>
  <!-- /.navbar -->

  <!-- Main Nav Asidebar Container -->
 
  
  <!-- TODA LA PAGINA -->
  <div class="mt-5 p-5">
    <!-- Titulo de la vista -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DESCRIPCION CURSO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
</svg><a href="../../controller/invitado/controller_cursos_inicio.php" style="text-decoration:none; color:black;">REGRESAR</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.fin titulo de la vista -->

    <!-- Contenido principal vista -->
    <section class="content">
      <div class="container-fluid">
      <section class="content">
    <?php if (isset($curso1) && is_array($curso1)) : ?>
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?php echo $curso1['subject_name']; ?></h3>
                <div class="col-12">
                   
                    <img src="<?php echo $ruta_inicio . $curso1['photo']; ?>" class="product-image" alt="Product Image">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $curso1['subject_name']; ?></h3>
                <p><?php echo $curso1['description']; ?></p>
                <hr>
                <h3 class="my-3">TEMAS</h3>
                <ul>
                    <?php foreach ($curso1['topics_array'] as $topic): ?>
                        <li><?php echo $topic; ?></li>
                    <?php endforeach; ?>
                </ul>
                 <a type="button" href='https://wa.me/+573123467007?text=Hola,%20Estoy%20interesado%20en%20sus%20cursos%20'class="btn-animado animacion-cuatro color-instagram" style="text-decoration:none;">
                    <!-- icono whatsapp -->
                    <i class="fab fa-whatsapp"></i>
                    <span class="tex-icono">Chatea con nosotros</span>
                </a>
                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <h3 class="mt-4">Cursos sugeridos</h3>
        <!-- Carrusel de cursos relacionados -->
        <div class="mb-3 col-md-6 p-3 rounded">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: #f2f2f2;">
        <div class="carousel-inner">
            <?php foreach ($cursos_area as $index => $curso2) : ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="border p-3 mx-auto curso-container" style="max-width: 300px; margin-top:5px; margin-bottom: 5px; background: linear-gradient(to bottom, #7FFFD4, #40E0D0); border-radius:7px;">
                        <article class="materias">
                            <a href="controller_descripcion_curso_invitado.php?id_curso=<?php echo $curso2['subject_id']; ?>" class="d-flex justify-content-center align-items-center" style="height: 120px; position: relative; border-radius: 10px;">
                                <img src="<?php echo $ruta_inicio . $curso2['photo']; ?>" style="max-height: 100%; max-width: 100%; object-fit: cover;" alt="Curso Image">
                            </a>
                            <h5 class="text-center mt-3"><?php echo $curso2['subject_name']; ?></h5>
                            <div class="adquirir-button text-center">
                                <a href="controller_descripcion_curso_invitado.php?id_curso=<?php echo $curso2['subject_id']; ?>" style="color: white;">ADQUIRIR</a>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

        
<div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Recomendaciones</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Docentes</a>
                    <a class="nav-item nav-link" id="product-price-tab" data-toggle="tab" href="#product-price" role="tab" aria-controls="product-price" aria-selected="false">Precio</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $curso1['description']; ?></div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    <h3>Recomendaciones para seguir un curso</h3>
                    <ol>
                        <li><strong>Establece objetivos claros:</strong> Antes de comenzar el curso, define qué es lo que esperas lograr al finalizarlo.</li>
                        <!-- Otras recomendaciones -->
                    </ol>
                </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    
                        <?php if (!empty($docentes)) : ?>
                            <h3>Docentes</h3>
                            <ul class="list-unstyled">
                                <?php foreach ($docentes as $docente) : ?>
                                    <li><?php echo $docente['docente'] . ' ' . $docente['lastname'];  ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <h4>No se encontraron docentes vinculados para este curso.</h4>
                        <?php endif; ?>

                    
                </div>
                <div class="tab-pane fade col-md-3" id="product-price" role="tabpanel" aria-labelledby="product-price-tab">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>TIPO</th>
                                <th>Precio por hora</th>
                                <th>Precio por clase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí puedes agregar filas con los cursos y sus precios -->
                            <?php foreach ($mostrar_precio as $precio) : ?>
                                <tr>
                                    <td><?php echo $precio['name']; ?> </td>
                                    <td><?php echo $precio['p_student']; ?></td>
                                    <td><?php echo $precio['p_class']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- Y así sucesivamente -->
                        </tbody>
                    </table>
                </div>
            </div>
</div>







        
    <?php else : ?>
        <p>No se encontraron detalles para este curso.</p>
    <?php endif; ?>
</section>
    </div>

    </section>
    <!-- /. Maincontent -->
  </div> 
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


