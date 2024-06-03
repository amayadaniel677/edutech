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
        .mi-clase-personalizada .swal2-popup {
            font-size: 16px !important;
            height: auto !important;
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
                            <h1 class="m-0">Lista
                                <?php echo $tipo_usuario; ?>s
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./controller_usuario.php">Usuarios</a></li>
                                <li class="breadcrumb-item"><a href="./controller_buscar_usuario.php">Buscar
                                        usuarios</a></li>
                                <li class="breadcrumb-item active">
                                    <?php echo $tipo_usuario; ?>s
                                </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->

            <!-- Contenido principal vista -->
            <section class="content">

                <!-- mostrar errores  -->
                <div class="container-fluid" style="max-width:1000px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert" role="alert">
                                <!-- Botón con la clase swalDefaultSuccess -->
                                <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none">
                                    Launch Success Toast
                                </button>
                                <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">
                                    info
                                </button>
                                <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none ">
                                    error
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid col-md-12">

                    <div class="card">
                        <div class="card-header">
                           Usuarios <?php echo $tipo_usuario; ?>s
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
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($bandera and $usuarios != null and $usuarios != false and $usuarios != '' ) {

                                        foreach ($usuarios as $usuario) {
                                            echo '<tr>';
                                            echo '<td>' . $usuario['rol'] . '</td>';
                                            echo '<td>' . $usuario['name'] . " " . $usuario['lastname'] . '</td>';
                                            echo '<td>' . $usuario['email'] . '</td>';
                                            echo '<td>' . $usuario['dni'] . '</td>';
                                            echo '<td>' . $usuario['city'] . '</td>';
                                            echo '<td>' . $usuario['address'] . '</td>'; 
                                            echo '<td>' . $usuario['status'] . '</td>';
                                            echo '<td>';
                                            echo '<div class="d-flex flex-wrap justify-content-start">';
                                         
                                           
                                            if($usuario['status'] == 'active'){
                                               $accion='desactivar';
                                               echo '<a  data-toggle="tooltip" title="Editar usuario" href="controller_editar_usuario.php?id_usuario='. $usuario['id']. '&tipo_usuario='. $tipo_usuario. '" class="btn btn-primary mr-2">';
                                               echo '<i class="fas fa-edit"></i>';
                                               echo '</a>';
                                               echo '<a href="#"  data-toggle="tooltip" title="Desactivar usuario" onclick="confirmarEliminarUsuario(\'controller_eliminar_usuario.php?id_usuario='. $usuario['id']. '&tipo_usuario='. $tipo_usuario. '&accion='. $accion. '\', \''.$accion.'\')" class="btn btn-danger mr-2">';
                                                echo '<i class="fas fa-trash"></i>';
                                                echo '</a>';
                                            }elseif($usuario['status'] == 'inactive'){
                                                $accion='activar';
                                                echo '<a href="#"  data-toggle="tooltip" title="Activar usuario" onclick="confirmarEliminarUsuario(\'controller_eliminar_usuario.php?id_usuario='. $usuario['id']. '&tipo_usuario='. $tipo_usuario. '&accion='. $accion. '\', \''.$accion.'\')" class="btn btn-success mr-2">';      
                                                echo '<i class="fas fa-undo"></i> ';
                                                echo '</a>';
                                            }
                                            
                                            if ($usuario['rol'] == 'docente' and $usuario['status'] == 'active') {
                                                $usuario_id = $usuario['id'];
                                                echo "  <a href='#' class='btn btn-primary abrir-modal-docente mr-2' data-toggle='tooltip' data-target='#modalDocente' data-id='$usuario_id' data-toggle='tooltip' data-placement='top' title='sumar horas trabajadas'><i class='fas fa-clock' ></i></a>";
                                            } elseif($usuario['rol'] == 'estudiante' and $usuario['status'] == 'active') {
                                                $usuario_id = $usuario['id'];
                                                echo "  <a href='#' class='btn btn-success abrir-modal-estudiante mr-2' data-toggle='tooltip' data-target='#modalEstudiante' data-id-estudiante='$usuario_id' data-toggle='tooltip' data-placement='top' title='agregar horas al estudiante'><i class='fas fa-clipboard-check'></i>
                                                </a>";
                                            }
                                            echo '</div>'; // Cierre del div que contiene los botones
                                            echo '</td>';
                                            
                                            echo '</tr>';
                                        }
                                    }else{
                                        echo '<tr>';
                                        echo '<td colspan="8" class="text-center">No se encontraron usuarios</td>';
                                        echo '</tr>';
                                    }



                                    ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalDocente" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
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
                                                                <label for="horas">Cantidad de horas trabajadas:</label>
                                                                <br>
                                                                <input type="number" name="horas" id="horas" class="form-control" placeholder="Cantidad horas">
                                                            </div>
                                                            <div class="col-md-10 mt-3 mb-5">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button id="btnPagar" class="btn btn-primary">agregar</button>

                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalEstudiante" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="miModalLabel">Asistencia estudiante</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Aquí irá el contenido dinámico del modal -->
                                                    <!-- Agrega el ID "formPagar" al formulario -->
                                                    <form id="formAsistencia" method="POST" action="">
                                                        <div class="">
                                                            <input type="hidden" name="estudiante_id_form" id="estudiante_id_form">
                                                            <div class="col-md-12 mt-3">


                                                                <div class="form-group">
                                                                    <label>Seleccione un curso</label>
                                                                    <select name='cursoSeleccionado' class="form-control select2" id="miSelect2" style="width: 100%;">
                                                                        <option selected="selected">Seleccione uno
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <label for="horasAsistidas">Cantidad de horas
                                                                    asistidas:</label> <br>
                                                                <input required type="number" name="horasAsistidas" id="horasAsistidas" class="form-control" placeholder="Cantidad horas">
                                                            </div>

                                                            <div class="col-md-10 mt-3 mb-5">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button id="btnAsistencia" class="btn btn-primary">Pagar</button>

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
                                        <th scope="col">Rol</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col"># Documento</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Estado</th>
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
         
           <!-- Main Footer -->
        <?php include('../../../view/admin/layouts/footer.php'); ?>
           <!-- FIN Footer -->
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

 
   
   

    </div> <!--fin de toda la pagina wrapper -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- capturar el id del usuario -->
    <script>
        $(document).ready(function() {
            // Adjunta el evento de clic a los botones que abren modales de docentes
            $(document).on('click', '.abrir-modal-docente', function() {
                const docenteId = this.getAttribute('data-id'); // Obtiene el valor del atributo data-id
                document.getElementById('docente_id').value = docenteId; // Asigna el valor al input
            });

            // Adjunta el evento de clic a los botones que abren modales de estudiantes
            $(document).on('click', '.abrir-modal-estudiante', function() {
                
                document.getElementById('estudiante_id_form').value = '';

               

                const estudianteId = this.getAttribute('data-id-estudiante'); // Obtiene el valor del atributo data-id

               

                document.getElementById('estudiante_id_form').value = estudianteId; // Asigna el valor al input

                // Empieza el AJAX
                let data = {
                    'estudiante_id': estudianteId
                };
              

                $.ajax({
                    url: 'controller_usuarios_totales.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        
                        var selectElement = document.getElementById('miSelect2');
                        selectElement.innerHTML = ''; // Limpiar el select

                        // Crear y agregar la opción marcadora de posición
                        var placeholderOption = document.createElement('option');
                        placeholderOption.value = ""; // Puedes asignar un valor específico aquí
                        placeholderOption.text = "Seleccione un curso";
                        selectElement.appendChild(placeholderOption);
                        // Iterar sobre la respuesta y generar las opciones
                        for (var i = 0; i < response.length; i++) {
                            var curso = response[i];
                            var option = document.createElement('option');
                            option.value = curso.id; // Usar el ID como valor de la opción
                            option.text = curso.subject_name + ' - ' + curso.modality + ' (' + curso.quantity_type + ')';
                            selectElement.appendChild(option);
                        }
                    }
                });



            });
        });
    </script>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    confirmButtonText: 'Sí, Agregar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    // Si el usuario confirma, enviar el formulario
                    if (result.isConfirmed) {
                        $('#formPagar').submit(); // Enviar el formulario
                    }
                });
            });
            $('#btnAsistencia').click(function(e) {
                e.preventDefault(); // Evitar el envío del formulario por defecto

                // Mostrar la alerta de confirmación
                Swal.fire({
                    title: '¿Estás seguro de confirmar asistencia?',
                    text: "Esta acción no se puede revertir.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí,confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    // Si el usuario confirma, enviar el formulario
                    if (result.isConfirmed) {
                        $('#formAsistencia').submit(); // Enviar el formulario
                    }
                });
            });
        });
        // Función para confirmar la eliminación de un usuario
        function confirmarEliminarUsuario(url,accion) {
            Swal.fire({
                title: `¿Estás seguro de ${accion} el usuario?`,
                text: "Esto podría afectar los cursos relacionados del usuario",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText:  `Sí, ${accion}`,
                cancelButtonText: "Cancelar",
                confirmButtonColor: '#d33',
                reverseButtons: true,
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
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
    $msj_error = $msj_error ?? ''; // Asegura que $mensaje_editar esté definido
    ?>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000,
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
                    title: '<?php echo $msj_error; ?>'
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


                $('#btnInfo').click();



            <?php endif; ?>
            <?php if (isset($msj_error) && !empty($msj_error)) : ?>
                // Simular un clic en el botón para activar el SweetAlert


                $('#btnError').click();



            <?php endif; ?>


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
   <script>
function asignarManejadoresDeEventos() {
    // Reinicia los manejadores de eventos para los botones de abrir modal
    $('.abrir-modal-docente').off('click').on('click', function(event) {
        event.preventDefault();
        var targetModal = $(this).data('target');
        $(targetModal).modal('show');
    });

    $('.abrir-modal-estudiante').off('click').on('click', function(event) {
        event.preventDefault();
        var targetModal = $(this).data('target');
        $(targetModal).modal('show');
    });
}

$(document).ready(function() {
    // Verifica si el elemento ya ha sido inicializado como una tabla de DataTables
    if (!$.fn.dataTable.isDataTable('#example1')) {
        // Inicializa DataTables solo si el elemento no ha sido inicializado previamente
        $('#example1').DataTable({
            responsive: true // Activa el modo responsive
        });
    }

    // Asigna manejadores de eventos inicialmente
    asignarManejadoresDeEventos();

    // Escucha el evento responsive-display para actualizar los manejadores de eventos
    $('#example1').on('responsive-display.dt', function() {
        // Vuelve a asignar los manejadores de eventos después de que una fila responsive se expande o colapsa
        asignarManejadoresDeEventos();
    });

    // Escucha el evento draw.dt para actualizar los manejadores de eventos después de cualquier redibujado de la tabla (por ejemplo, al cambiar de página)
    $('#example1').on('draw.dt', function() {
        // Vuelve a asignar los manejadores de eventos después de que la tabla se redibuje
        asignarManejadoresDeEventos();
    });
});
</script>


<!-- // Docentes -->



<!-- // Estudiantes -->


    <!-- <script>
        $(document).ready(function() {
            $('.abrir-modal').on('click', function(e) {
                // Evita el comportamiento predeterminado del enlace
                e.preventDefault();

                // Muestra el modal
                $('#modalDocente').modal('show');
                $('#modalEstudiante').modal('show');

                // Aquí puedes agregar lógica adicional si necesitas mostrar el tooltip bajo ciertas condiciones
            });
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </scrip> -->

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