</body>

</html>
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
    <title>EduTech | Abonos pendientes</title>
    <!-- LINKS DataTables -->
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <!-- CSS CURSOS ADMIN -->
    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
    <!-- css alertas mensajes -->
    <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
    <!-- necesario para el tamaño de mensajes alerta  -->

    <style>
        .mi-clase-personalizada .swal2-popup {
            font-size: 16px !important;
            height: auto !important;
            padding-bottom: 4px !important;
        }

        .swal2-popup h2 {
            margin-top: 8px !important;
            font-size: 18px !important;
        }

        .content-wrapper {
            height: auto !important;
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
                            <h1 class="m-0">Saldos pendientes</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./controller_ventas.php">Ventas</a></li>
                                <li class="breadcrumb-item active">Saldos pendientes</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->

            <!-- Contenido principal vista -->
            <section class="content">

                <button id="btnInfo" type="button" class="btn btn-success swalDefaultSuccess" style="display:none ">

                </button>
                <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">

                </button>
                <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none ">

                </button>
                <div class="container-fluid" style="max-width:1300px;">


                    <!-- tabla -->
                    <div class="container mt-2">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Saldos pendientes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha Venta</th>
                                            <th scope="col">Id venta</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Valor venta</th>
                                            <th scope="col">Saldo pendiente</th>
                                            <th scope="col">Ultimo abono</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($abonos_pendientes) and !empty($abonos_pendientes)) {

                                            foreach ($abonos_pendientes as $abono) {
                                                echo '<tr>
                      
                              <td>' . $abono['fecha_venta'] . '</td>
                              <td>' . $abono['id_venta'] . '</td>
                              <td>' . $abono['person_name'], " ", $abono['person_lastname'] . '</td>
                              <td>' . $abono['valor_venta'] . '</td>
                              <td>' . $abono['valor_venta'] - $abono['valor_abonado'] . '</td>
                              <td>' . $abono['ultimo_abono'] . '</td>
                              <td>
                              <a class="btn btn-outline-success abrir-modal-abonos mr-2" data-target="#modalAbonos" data-id-saldo="' . $abono['id_saldo'] . '" data-toggle="tooltip" data-placement="top" title="Nuevo abono">
                              <i class="fas fa-plus"></i>
                              </a>
                          
                              <a href="controller_detalle_abonos.php?id_saldo=' . $abono['id_saldo'] . '"   class="btn btn-primary" data-toggle="tooltip" title="Ver abonos realizados" id="detalleSaldo"><i  class="fas fa-eye"></i></a>
                               

                              </td>
                            </tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="6">No hay ventas disponibles.</td></tr>';
                                        }

                                        // Cierra la tabla HTML

                                        ?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalAbonos" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="miModalLabel">Nuevo abono</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Aquí irá el contenido dinámico del modal -->
                                                        <!-- Agrega el ID "formPagar" al formulario -->
                                                        <form id="formAddAbono" method="POST" action="">
                                                            <div class="">
                                                                <input type="hidden" name="saldo_id" id="saldo_id">
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="valor_abono">Valor del abono</label>
                                                                    <br>
                                                                    <input type="number" name="valor_abono" id="valor_abono" class="form-control" placeholder="precio del abono">
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label for="valor_abono_2">Confirmar valor del
                                                                        abono</label>
                                                                    <br>
                                                                    <input type="number" name="valor_abono_2" id="valor_abono_2" class="form-control" placeholder="confirmar precio">
                                                                </div>
                                                                <div class="col-md-10 mt-3 mb-5">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                    <button id="btnAddAbono" class="btn btn-primary">Agregar abono</button>

                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Fecha Venta</th>
                                            <th scope="col">Id venta</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Valor venta</th>

                                            <th scope="col">Saldo pendiente</th>
                                            <th scope="col">Ultimo abono</th>
                                            <th scope="col">Agregar abono</th>

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

    </div>
    <!--fin de toda la pagina wrapper -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->




    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- popper -->
    <!-- <script src="../../../view/admin/plugins/popper/umd/popper.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.abrir-modal-abonos', function() {
                const saldo_id = this.getAttribute(
                    'data-id-saldo'); // Obtiene el valor del atributo data-id
                document.getElementById('saldo_id').value = saldo_id; // Asigna el valor al input
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Escuchar el click del botón "Pagar"
            $('#btnAddAbono').click(function(e) {
                e.preventDefault(); // Evitar el envío del formulario por defecto

                // Mostrar la alerta de confirmación
                Swal.fire({
                    title: '¿Estás seguro que es el abono correcto?',
                    text: "Esta acción no se puede revertir y descontará al total del saldo pendiente.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    // Si el usuario confirma, enviar el formulario
                    if (result.isConfirmed) {
                        $('#formAddAbono').submit(); // Enviar el formulario
                    }
                });
            });

        });
    </script>
    <?php
    $mensaje_error = $mensaje_error ?? ''; // Asegura que $mensaje_editar esté definido
    $mensaje_ok = $mensaje_ok ?? ''; // Asegura que $mensaje_editar esté definido
    ?>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 7000,
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
                    title: ''
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

            <?php if (isset($mensaje_ok) && !empty($mensaje_ok)) : ?>
                // Simular un clic en el botón para activar el SweetAlert


                $('#btnSuccess').click();



            <?php endif; ?>
            <?php if (isset($mensaje_error) && !empty($mensaje_error)) : ?>
                // Simular un clic en el botón para activar el SweetAlert


                $('#btnError').click();



            <?php endif; ?>
            // crear confirmacion con sweet alert al dar click en boton-eliminarVenta

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

    <script>
        // Función para confirmar la eliminación de un usuario
        function confirmarEliminarVenta(url) {
            Swal.fire({
                title: "¿Estás seguro de inactivar la venta?",
                text: "Esto podría restar las horas compradas",
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
    </script>
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
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $(document).on('click', '.abrir-modal-abonos', function(event) {
                event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
                var targetModal = $(this).data('target'); // Obtener el objetivo del modal
                var idSaldo = $(this).data('id-saldo'); // Obtener el ID del saldo

                // Aquí puedes agregar lógica adicional para usar el idSaldo si es necesario

                $(targetModal).modal('show'); // Mostrar el modal
            });

        });
    </script>

</body>

</html>