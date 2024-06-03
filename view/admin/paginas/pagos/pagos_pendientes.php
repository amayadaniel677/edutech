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
    <title>EduTech | Pagos Pendientes de Docentes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- LINKS DataTables -->
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- css alertas mensajes -->
    <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <!-- CSS CURSOS ADMIN -->
    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />

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
                            <h1 class="m-0"> Pagos Pendientes</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./controller_pagos.php">Gestionar pagos</a></li>
                                <li class="breadcrumb-item active">Pagos pendientes</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->

            <!-- Contenido principal vista -->
            <section class="content">
                <!-- div para mostrar los errores si existen, $mensaje_ok o $error -->
                <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
                    Launch Success Toast
                </button>
                <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
                    error
                </button>
                <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">
                    error
                </button>
                <div class="container-fluid" style="max-width:1000px;">

                    <!-- /.card-body -->
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-header">
                            <h3 class="card-title"> Pagos pendientes a docentes</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Docente</th>
                                        <th>Ultimo pago</th>
                                        <th>Horas totales</th>
                                        <th>Pagar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($pagos) and empty($pagos) and $pagos!='') : ?>
                                    <?php foreach ($pagos as $index => $pago) : ?>
                                        <?php setlocale(LC_TIME, 'es_ES.utf8', 'spanish', 'Spanish_Spain');

// Suponiendo que $venta['sale_date'] contiene la fecha en formato 'Y-m-d H:i:s'
$fecha_pago = $pago['last_pay'];

// Utiliza strftime para formatear la fecha y hora, excluyendo los segundos
$formatted_date = strftime('%Y-%b-%d %H:%M', strtotime($fecha_pago));
?>
                                    <tr class="odd">
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $pago['name'] . ' ' . $pago['lastname'] ?></td>
                                        <td><?= $formatted_date ?></td>
                                        <td><?= $pago['total_hours'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary abrir-modal " data-toggle="tooltip"
                                                data-placement="right" data-target="#miModal"
                                                data-id="<?= $pago['id'] ?>" title="Pagar al docente">
                                                <i class="fas fa-dollar-sign"></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <?php endforeach; ?>
                                    <!-- else -->
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No hay pagos pendientes</td>
                                    </tr>
                                    <?php endif; ?>
                                    

                                    <!-- Modal -->
                                    <div class="modal fade" id="miModal" tabindex="-1" role="dialog"
                                        aria-labelledby="miModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="miModalLabel">Pagos docente</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Aquí irá el contenido dinámico del modal -->
                                                    <form method="POST" id='form-pagarDocente' action="">
                                                        <div class="">

                                                            <input type="hidden" name="pago_id" id="pago_id">

                                                            <div class="col-md-12 mt-3">
                                                                <label for="cantidad">Cantidad de horas
                                                                    trabajadas:</label> <br>
                                                                <input required type="number" name="cantidad"
                                                                    id="cantidad" class="form-control"
                                                                    placeholder="Cantidad horas">
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="valor_horas">Precio por hora:</label> <br>
                                                                <input required type="number" name="valor_horas"
                                                                    id="valor_horas" class="form-control"
                                                                    placeholder="Valor horas">
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="valor_total">Valor total a pagar:</label>
                                                                <br>
                                                                <input readonly type="number" name="valor_total"
                                                                    id="valor_total" class="form-control"
                                                                    placeholder="Valor total">
                                                            </div>
                                                            <div class="col-md-10 mt-3 mb-5">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" id='btn-pagarDocente'
                                                                    class="btn btn-primary">Pagar</button>
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
                                            const pagoId = this.getAttribute(
                                                'data-id'
                                            ); // Obtiene el valor del atributo data-id
                                            document.getElementById('pago_id').value =
                                                pagoId; // Asigna el valor al input
                                        });
                                    });
                                });
                                </script>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Docente</th>
                                        <th>Ultimo pago</th>
                                        <th>Horas totales</th>
                                        <th>Pagar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->


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

    <!-- alerta de agregar pago -->
    <script src="../../../resource/js/admin/pagos/alert_pagos_pendientes.js"></script>


    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.abrir-modal').on('click', function(e) {
            // Evita el comportamiento predeterminado del enlace
            e.preventDefault();

            // Muestra el modal
            $('#miModal').modal('show');

            // Aquí puedes agregar lógica adicional si necesitas mostrar el tooltip bajo ciertas condiciones
        });
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    </script>

    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
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


    <!-- script de la pagiana  calcular valor total-->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona los campos de entrada
        const cantidadInput = document.getElementById('cantidad');
        const valorHorasInput = document.getElementById('valor_horas');
        const valorTotalInput = document.getElementById('valor_total');

        // Función para calcular el valor total
        function calcularValorTotal() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const valorHoras = parseFloat(valorHorasInput.value) || 0;
            const valorTotal = cantidad * valorHoras;
            valorTotalInput.value = valorTotal;
        }

        // Escucha los eventos de cambio en los campos de entrada
        cantidadInput.addEventListener('input', calcularValorTotal);
        valorHorasInput.addEventListener('input', calcularValorTotal);

        // Calcula el valor total inicialmente
        calcularValorTotal();
    });
    </script>

    <?php
  $mensaje_ok = $mensaje_ok ?? ''; // Asegura que $mensaje_ok esté definido
  $error = $error ?? ''; // Asegura que $mensaje_ok esté definido
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
                title: '<?php echo $mensaje_ok; ?>'

            })
        });
        $('.swalDefaultInfo').click(function() {
            Toast.fire({
                icon: 'info',
                title: '<?php echo $error; ?>'
            })
        });
        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: '<?php echo $error; ?>'
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
        // Verificar si la variable $mensaje_ok está definida
        <?php if (isset($mensaje_ok) && !empty($mensaje_ok)) : ?>
        // Simular un clic en el botón para activar el SweetAlert
        $('#btnSuccess').click();
        <?php endif; ?>
        <?php if (isset($error) && !empty($error)) : ?>
        // Simular un clic en el botón para activar el SweetAlert

        $('#btnError').click();



        <?php endif; ?>


    });
    </script>
    <script>
    // PARA FORMULARIOS O MODALES
    $(document).ready(function() {
        // Función para validar los campos requeridos
        function validarCampos() {
            var cantidad = $('#cantidad').val().trim();
            var valorHoras = $('#valor_horas').val().trim();
            var valorTotal = $('#valor_total').val().trim();

            // Verificar si alguno de los campos requeridos está vacío
            if (!cantidad || !valorHoras || !valorTotal) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Por favor, completa todos los campos requeridos.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                return false;
            }

            return true;
        }

        // Escuchar el click del botón "Pagar"
        $('#btn-pagarDocente').click(function(e) {
            e.preventDefault(); // Evitar el envío del formulario por defecto

            // Validar campos antes de mostrar el SweetAlert
            if (!validarCampos()) {
                return; // Salir de la función si hay campos vacíos
            }

            // Mostrar la alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro de confirmar el pago?',
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
                    $('#form-pagarDocente').submit(); // Enviar el formulario
                }
            });
        });
    });
    </script>
    <!-- Inicializar tooltips -->


</body>

</html>