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
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <!-- SwadeetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="../../../view/admin/plugins/toastr/toastr.min.css">
    <!-- css alertas mensajes -->
    <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
    <!-- necesario para el tamaño de mensajes alerta  -->

    <!-- CSS CURSOS ADMIN -->
    <link rel="stylesheet" href="../../../resource/css/cursos/descripcion_curso.css" />
    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
    <!-- SwadeetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

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
                            <h1 class="m-0">Descripción Curso</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./controller_gestionar_cursos">Cursos</a></li>
                                <li class="breadcrumb-item"><a href="./controller_catalogo_cursos">Catalogo</a></li>
                                <li class="breadcrumb-item active">Descripcion curso</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->

            <!-- Contenido principal vista -->
          

            <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
                Launch Success Toast
            </button>
            <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
                error
            </button>
            <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">
                error
            </button>
            <!-- MOSTRAR LISTA DE ERRORES -->
            <?php if (isset($errores)) : ?>
                <div class="container-fluid" style='max-width:1000px;'>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style=" font-size:20px;  opacity:0.5;">x</button>

                        <h5><i class="icon fas fa-ban"></i> Errores</h5>
                        <ul class="list-group list-group-flush pl-3">
                            <?php foreach ($errores as $error) : ?>
                                <li class=""><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php include('../../../view/layout/descripcion_curso.php'); ?>
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
        <?php include('../../../view/admin/layouts/footer.php'); ?>
        <!--FIN   Main Footer -->

    </div>
    <!--fin de toda la pagina wrapper -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    
<?php
$mensaje_ok = $mensaje_ok ?? ''; // Asegura que $mensaje_editar esté definido
$mensaje_error = $mensaje_error ?? ''; // Asegura que $mensaje_editar esté definido
$mensaje_warning = $mensaje_warning ?? ''; // Asegura que $mensaje_editar esté definido
$mensaje_info = $mensaje_info ?? ''; // Asegura que $mensaje_editar esté definido
?>
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
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
                title: '<?php echo $mensaje_warning; ?>'
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
            $('#btnSuccess').click();
        <?php endif; ?>
        <?php if (isset($mensaje_error) && !empty($mensaje_error)) : ?>
            $('#btnError').click();
        <?php endif; ?>
        <?php if (isset($mensaje_warning) && !empty($mensaje_warning)) : ?>
            $('#btnWarning').click();
        <?php endif; ?>
        <?php if (isset($mensaje_info) && !empty($mensaje_info)) : ?>
            $('#btnInfo').click();
        <?php endif; ?>


    });
</script>
    <!-- Toastr -->
    <script>
        function confirmarEliminar(id_curso,status) {
            Swal.fire({
                title: '¿Estás seguro de cambiar el estado del curso?',
                text: "Esta acción si se puede revertir",
                icon: 'warning',
                showCancelButton: true, 
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '',
                confirmButtonText: 'Sí, confirmar!',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, redireccionamos al controlador PHP para eliminar el curso
               // Construye la URL con ambas variables
  var url = 'controller_descripcion_curso.php?id_eliminar=' + id_curso + '&status=' + status;

// Redirige al usuario a la nueva URL
window.location.href = url;
                }
            });
        }
    
    $(document).ready(function() {
        // Escuchar el click del botón "Pagar"
        $('#btn-actualizarCurso').click(function(e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto

            // Mostrar la alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro de editar el curso?',
              
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, editar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                // Si el usuario confirma, enviar el formulario
                if (result.isConfirmed) {
                    $('#form-actualizarCurso').submit(); // Enviar el formulario
                }
            });
        });

    });

    </script>

</body>

</html>