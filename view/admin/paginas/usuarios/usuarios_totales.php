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
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="../../../view/admin/plugins/toastr/toastr.min.css">
    <!-- LINKS DataTables -->
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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

        .mi-clase-personalizada .swal2-popup {
            font-size: 16px !important;
            height: 70px !important;
        }

        .swal2-popup h2 {
            margin-top: 8px !important;
            font-size: 18px !important;
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
                                <!-- Botón con la clase swalDefaultSuccess -->
                                <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
                                    Launch Success Toast
                                </button>
                                <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
                                    error
                                </button>
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

                                            echo '<a href="#" onclick="confirmarEliminarUsuario(\'' . 'controller_eliminar_usuario.php?id_usuario=' . $usuario['id'] . '&tipo_usuario=' . $tipo_usuario . '\')" class="btn btn-danger" id="desactivarUsuario">';

                                            echo '<i class="fas fa-trash"></i>';
                                            echo '</a>';
                                            if ($usuario['rol'] == 'docente') {
                                                $usuario_id = $usuario['id'];
                                                echo "  <a href='#' class='btn btn-primary abrir-modal' data-toggle='modal' data-target='#miModal' data-id='$usuario_id' data-toggle='tooltip' data-placement='top' title='sumar horas trabajadas'><i class='fas fa-clock'></i></a>";
                                            } else {
                                                $usuario_id = $usuario['id'];
                                                echo "  <a href='#' class='btn btn-success abrir-modal' data-toggle='modal' data-target='#modalEstudiante' data-id-estudiante='$usuario_id' data-toggle='tooltip' data-placement='top' title='agregar horas al estudiante'><i class='fas fa-clock'></i></a>";
                                            }
                                            echo "";
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    }



                                    ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="
                                    " tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="miModalLabel">Pagos docente</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Aquí irá el contenido dinámico del modal -->
                                                    <!-- Agrega el ID "formPagar" al formulario -->
                                                    <form id="formPagar" method="POST" action="">
                                                        <div class="">
                                                            <input type="hidden" name="docente_id" id="docente_id">
                                                            <div class="col-md-12 mt-3">
                                                                <label for="horas">Cantidad de horas trabajadas:</label> <br>
                                                                <input type="number" name="horas" id="horas" class="form-control" placeholder="Cantidad horas">
                                                            </div>
                                                            <div class="col-md-10 mt-3 mb-5">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button id="btnPagar" class="btn btn-primary">Pagar</button>

                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEstudiante"  role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="miModalLabel">Pagos docente</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Aquí irá el contenido dinámico del modal -->
                                                    <!-- Agrega el ID "formPagar" al formulario -->
                                                    <form id="formPagar" method="POST" action="">
                                                        <div class="">
                                                            <input type="hidden" name="estudiante_id" id="estudiante_id">
                                                            <div class="col-md-12 mt-3">
                                                                <label for="horas">Cantidad de horas trabajadas:</label> <br>
                                                                <div class="form-group">
                                                                    <label>Minimal</label>
                                                                    <select class="form-control select2" id="miSelect2" style="width: 100%;">
                                                                        <option selected="selected">Alabama</option>
                                                                        <option>Alaska</option>
                                                                        <option>California</option>
                                                                        <option>Delaware</option>
                                                                        <option>Tennessee</option>
                                                                        <option>Texas</option>
                                                                        <option>Washington</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 mt-3 mb-5">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button id="btnPagar" class="btn btn-primary">Pagar</button>

                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                <script>
                                    // Captura el evento de hacer clic en el enlace
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const abrirModalButtons = document.querySelectorAll('.abrir-modal');

                                        abrirModalButtons.forEach(function(button) {
                                            button.addEventListener('click', function() {
                                                const docenteId = this.getAttribute('data-id'); // Obtiene el valor del atributo data-id
                                                document.getElementById('docente_id').value = docenteId; // Asigna el valor al input
                                            });
                                        });
                                    });
                                </script>
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
    <!-- Select2 -->
    <script src="../../../view/admin/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {

            $('#modalEstudiante').on('shown.bs.modal', function() {
                setTimeout(function() {
                    $('#miSelect2').select2();
                }, 100); // Ajusta el tiempo según sea necesario
            });

            // Opcional: Inicializar Select2 solo para elementos con la clase .select2
            // $('.select2').select2();

            // Opcional: Inicializar Select2 solo para elementos con la clase .select2bs4 y tema Bootstrap 4
            // $('.select2bs4').select2({ theme: 'bootstrap4' });
        });
    </script>
    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../../../view/admin/plugins/toastr/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            // Escuchar el click del botón "Pagar"
            $('#btnPagar').click(function(e) {
                e.preventDefault(); // Evitar el envío del formulario por defecto

                // Mostrar la alerta de confirmación
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede revertir.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, pagar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    // Si el usuario confirma, enviar el formulario
                    if (result.isConfirmed) {
                        $('#formPagar').submit(); // Enviar el formulario
                    }
                });
            });
        });
    </script>

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

    <!-- Page specific script -->

    <!-- Script de las alertas de mensajes-->
    <?php
    $mensaje_editar = $mensaje_editar ?? ''; // Asegura que $mensaje_editar esté definido
    $msj_eliminar = $msj_eliminar ?? ''; // Asegura que $mensaje_editar esté definido
    ?>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 400000,
                width: '80%',
                customClass: {
                    container: 'mi-clase-personalizada'
                }


            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: '<?php echo $mensaje_editar; ?>'

                })
            });
            $('.swalDefaultInfo').click(function() {
                Toast.fire({
                    icon: 'info',
                    title: '<?php echo $msj_eliminar; ?>'
                })
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
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
            <?php if (isset($mensaje_editar) && !empty($mensaje_editar)) : ?>
                // Simular un clic en el botón para activar el SweetAlert
                $('#btnSuccess').click();
            <?php endif; ?>
            <?php if (isset($msj_eliminar) && !empty($msj_eliminar)) : ?>
                // Simular un clic en el botón para activar el SweetAlert

                console.log('entro');
                $('#btnInfo').click();



            <?php endif; ?>


        });
    </script>
    <script>
        // Función para confirmar la eliminación de un usuario
        function confirmarEliminarUsuario(url) {
            Swal.fire({
                title: "¿Estás seguro de inactivar el usuario?",
                text: "Esto podría afectar sus cursos activos",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, inactivar",
                cancelButtonText: "Cancelar",
                reverseButtons: true,
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        // Función para confirmar el envío del formulario de pago
        $(document).ready(function() {
            $('#btnPagar').click(function(e) {
                e.preventDefault();
                swal({
                        title: "¿Estás seguro?",
                        text: "Esta acción no se puede deshacer.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willSubmit) => {
                        if (willSubmit) {
                            $('#formPagar').submit();
                        }
                    });
            });
        });
    </script>



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

    <script class="alertas-opcionales">
        //     $('.toastrDefaultSuccess').click(function() {
        //         toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        //     });
        //     $('.toastrDefaultInfo').click(function() {
        //         toastr.info('informacion relevante.', '', {
        //             timeOut: 30000
        //         });
        //     });
        //     $('.toastrDefaultError').click(function() {
        //         toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        //     });
        //     $('.toastrDefaultWarning').click(function() {
        //         toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        //     });

        //     $('.toastsDefaultDefault').click(function() {
        //         $(document).Toasts('create', {
        //             title: 'Toast Title',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultTopLeft').click(function() {
        //         $(document).Toasts('create', {
        //             title: 'Toast Title',
        //             position: 'topLeft',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultBottomRight').click(function() {
        //         $(document).Toasts('create', {
        //             title: 'Toast Title',
        //             position: 'bottomRight',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultBottomLeft').click(function() {
        //         $(document).Toasts('create', {
        //             title: 'Toast Title',
        //             position: 'bottomLeft',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultAutohide').click(function() {
        //         $(document).Toasts('create', {
        //             title: 'Toast Title',
        //             autohide: true,
        //             delay: 750,
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultNotFixed').click(function() {
        //         $(document).Toasts('create', {
        //             title: 'Toast Title',
        //             fixed: false,
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultFull').click(function() {
        //         $(document).Toasts('create', {
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             icon: 'fas fa-envelope fa-lg',
        //         })
        //     });
        //     $('.toastsDefaultFullImage').click(function() {
        //         $(document).Toasts('create', {
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             image: '../../dist/img/user3-128x128.jpg',
        //             imageAlt: 'User Picture',
        //         })
        //     });
        //     $('.toastsDefaultSuccess').click(function() {
        //         $(document).Toasts('create', {
        //             class: 'bg-success',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultInfo').click(function() {
        //         $(document).Toasts('create', {
        //             class: 'bg-info',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultWarning').click(function() {
        //         $(document).Toasts('create', {
        //             class: 'bg-warning',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultDanger').click(function() {
        //         $(document).Toasts('create', {
        //             class: 'bg-danger',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        //     $('.toastsDefaultMaroon').click(function() {
        //         $(document).Toasts('create', {
        //             class: 'bg-maroon',
        //             title: 'Toast Title',
        //             subtitle: 'Subtitle',
        //             body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //         })
        //     });
        // });
    </script>

</body>

</html>