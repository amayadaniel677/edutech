<?php
$urlStarter = '../../../view/admin/';  //son desde el controlador
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
    <title>KEPLER | LISTADO DE USUARIOS </title>
    <!-- LINKS DataTables -->
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <!-- CSS CURSOS ADMIN -->
    <link rel="stylesheet" href="../../../resource/css/users/buscar_usuario1.css" />


    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
    <style>
        .table-responsive {
            max-height: 400px;
            /* Ajusta este valor según tus necesidades */
            overflow-y: auto;
            /* Habilita el desplazamiento vertical */
        }
    </style>
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
                            <h1 class="m-0">Buscar usuario</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Agregar curso</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->

            <!-- Contenido principal vista -->
            <section class="content">
                <!-- mostrar errores  -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert" role="alert">
                                <?php
                                // Validar si $mensaje_editar no está vacío
                                if (!empty($mensaje_editar)) {
                                    // Mostrar el encabezado con el mensaje y un fondo azul
                                    echo '<h5 class="bg-primary text-white p-3 mb-2" style="font-size: 1.25rem;">' . $mensaje_editar . '</h5>';
                                }
                                ?>
                                <?php
                                if (isset($msj_eliminar) && !empty($msj_eliminar)) {
                                    echo '<h5 class="bg-warning text-white p-3 mb-2" style="font-size: 1.25rem;">' . $msj_eliminar . '</h5>';
                                }
                                ?>
                                <?php
                                if (isset($mensaje)) {
                                    echo $mensaje;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col"># Documento</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($bandera) {

                                        foreach ($usuario_filtrado as $usuario) {
                                            echo '<tr>';
                                            echo '<td>' . $usuario['rol'] . '</td>';
                                            echo '<td>' . $usuario['name'] . " " . $usuario['lastname'] . '</td>';
                                            echo '<td>' . $usuario['email'] . '</td>';
                                            echo '<td>' . $usuario['dni'] . '</td>';
                                            echo '<td>' . $usuario['city'] . '</td>';
                                            echo '<td>' . $usuario['address'] . '</td>';
                                            echo '<td>';

                                            echo '<a href="controller_editar_usuario.php?id_usuario=' . $usuario['id'] . '&tipo_usuario=' . $tipo_usuario . '" class="btn btn-primary">';
                                            echo '<i class="fas fa-edit"></i>';
                                            echo '</a>';
                                            echo '<a href="controller_eliminar_usuario.php?id_usuario=' . $usuario['id'] . '&tipo_usuario=' . $tipo_usuario . '" class="btn btn-danger">';
                                            echo '<i class="fas fa-trash"></i>';
                                            echo '</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        foreach ($usuarios as $usuario) {
                                            echo '<tr>';
                                            echo '<td>' . $usuario['rol'] . '</td>';
                                            echo '<td>' . $usuario['name'] . " " . $usuario['lastname'] . '</td>';
                                            echo '<td>' . $usuario['email'] . '</td>';
                                            echo '<td>' . $usuario['dni'] . '</td>';
                                            echo '<td>' . $usuario['city'] . '</td>';
                                            echo '<td>' . $usuario['address'] . '</td>';
                                            echo '<td>';
                                            echo '<a href="controller_editar_usuario.php?id_usuario=' . $usuario['id'] . '&tipo_usuario=' . $tipo_usuario . '" class="btn btn-primary">';
                                            echo '<i class="fas fa-edit"></i>';
                                            echo '</a>';
                                            echo '<a href="controller_eliminar_usuario.php?id_usuario=' . $usuario['id'] . '&tipo_usuario=' . $tipo_usuario . '" class="btn btn-danger">';
                                            echo '<i class="fas fa-trash"></i>';
                                            echo '</a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    }



                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Nombres</th>

                                        <th scope="col">Correo</th>
                                        <th scope="col"># Documento</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>


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
    <?php include('../../../view/admin/layouts/footer.php'); ?>
    <!--FIN   Main Footer -->

    </div> <!--fin de toda la pagina wrapper -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../../view/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../../view/admin/plugins/jszip/jszip.min.js"></script>
    <script src="../../../view/admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../../view/admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../../view/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>