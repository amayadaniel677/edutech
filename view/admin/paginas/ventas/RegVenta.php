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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>EduTech | Add Curso</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />

    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
    <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
    <!-- necesario para el tamaño de mensajes alerta  -->

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
                            <h1 class="m-0">Registrar Venta </h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./controller_ventas.php">Ventas</a></li>
                                <li class="breadcrumb-item active">Registrar venta</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.fin titulo de la vista -->

            <!-- Contenido principal vista -->
            <section class="content ">
                <div class="container-fluid " style="max-width:1000px;">
                    <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess"
                        style="display:none">

                    </button>
                    <button id="btnInfo" type="button" class="btn btn-success swalDefaultInfo" style="display:none ">

                    </button>

                    <div>
                        <div class="">

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-add-detalle">
                                Agregar detalle<i class="bi bi-plus-circle"></i>
                            </button>
                            <?php include('modal_add_detalle_venta.php') ?>
                        </div>

                        <form action="" method='POST' class="row mb-3" id='form-venta'>

                            <?php
              function getPostValue($name)
              {
                // Verifica si el campo de entrada fue enviado con el formulario
                if (isset($_POST[$name])) {
                  // Devuelve el valor enviado, escapado para prevenir inyecciones de código HTML
                  return htmlspecialchars($_POST[$name]);
                }
                // Si el campo no fue enviado, devuelve una cadena vacía
                return '';
              }
              ?>

                            <input type="hidden" name="detallesVentaInput" id="detallesVentaInput" value="">
                            <div class="col-md-12 col-12">
                                <label for="dni_input" style="display:block;">DNI Cliente</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id='dni_input' name="dni"
                                        placeholder="DNI">
                                </div>
                            </div>


                            <div class="col-md-6 col-12">
                                <label for="nombres" style="display:block;">Nombres cliente</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" name="nombres" id="nombres"
                                        placeholder="Nombre" value="<?php echo getPostValue('nombres'); ?>">

                                </div>

                                <label for="ciudad" style="display:block;">Ciudad</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-building-user"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" id='ciudad' name="ciudad"
                                        placeholder="Ciudad" value="<?php echo getPostValue('ciudad'); ?>">
                                </div>
                                <label for="correo" style="display:block;">Correo</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input required type="email" class="form-control" name="correo" id="correo"
                                        placeholder="Correo" value="<?php echo getPostValue('correo'); ?>">
                                </div>


                                <label for="telefono" style="display:block;">Telefono</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-square-phone"></i></span>
                                    </div>
                                    <input required type="number" class="form-control" name="telefono" id='telefono'
                                        placeholder="Telefono" value="<?php echo getPostValue('telefono'); ?>">
                                </div>


                                <label for="valor-abonado" class="col-form-label">Pago inicial recibido:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="valor-abonado" name="valor-abonado"
                                        value='' placeholder="Cantidad pagada del cliente"
                                        value="<?php echo getPostValue('valor-total'); ?>">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="apellidos" style="display:block;">Apellidos cliente</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" name="apellidos" id="apellidos"
                                        placeholder="Nombre" value="<?php echo getPostValue('apellidos'); ?>">
                                </div>



                                <label for="dni" style="display:block;">Direccion</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input required type="text" class="form-control" id='direccion' name="direccion"
                                        placeholder="Direccion" value="<?php echo getPostValue('direccion'); ?>">
                                </div>

                                <label for="descuento" class="col-form-label">Descuento:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="descuento" name="descuento"
                                        placeholder="" value="<?php echo getPostValue('descuento'); ?>">
                                </div>

                                <label for="valor-total" class="col-form-label">Valor total a pagar:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input required readonly="" type="number" class="form-control" id="valor-total"
                                        name="valor-total" value='' placeholder=""
                                        value="<?php echo getPostValue('valor-total'); ?>">
                                </div>


                            </div>
                            <div class="col-12 d-flex justify-content-start">
                                <button type="button" class="btn btn-success " id="btn-regventa"
                                    value=''>Registrar</button>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Detalles de Venta</h2>
                            </div>


                            <div class="card-body table-responsive p-0">
                                <table id="tabla-detalles" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo venta</th>
                                            <th>Modalidad</th>
                                            <th>Categoria</th>
                                            <th>Nombre Curso</th>
                                            <th>Cantidad</th>
                                            <th>Valor hora o clase</th>
                                            <th>Subtotal</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

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
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../../../view/admin/plugins/toastr/toastr.min.js"></script>

    <script src="../../../resource/js/admin/ventas/modal_detalle_venta.js"></script>
    <!-- alert registrar venta -->
    <script src="../../../resource/js/admin/ventas/alert_registrar_venta3.js"></script>
    <!-- scripts para mostrar alertas de exito o error -->


    <?php
  $mensaje = $mensaje ?? ''; // Asegura que $mensaje esté definido
  $error = $error ?? ''; // Asegura que $mensaje esté definido
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
                title: '<?php echo $mensaje; ?>'

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
        // Verificar si la variable $mensaje está definida
        <?php if (isset($mensaje) && !empty($mensaje)) : ?>
        // Simular un clic en el botón para activar el SweetAlert
        $('#btnSuccess').click();
        <?php endif; ?>
        <?php if (isset($error) && !empty($error)) : ?>
        // Simular un clic en el botón para activar el SweetAlert

        console.log('entro');
        $('#btnInfo').click();



        <?php endif; ?>


    });
    </script>


    <!-- actualiza inputs por dni-->
    <script>
    document.getElementById('dni_input').addEventListener('keyup', function() {
        var dni = this.value;
        fetch('controller_regventa.php?dni_input=' + dni)
            .then(response => response.json())
            .then(data => {
                // Verifica si los datos devueltos son válidos
                if (data && data.name !== undefined && data.lastname !== undefined && data.city !==
                    undefined && data.address !== undefined && data.email !== undefined && data.phone !==
                    undefined) {
                    document.getElementById('nombres').value = data.name;
                    document.getElementById('apellidos').value = data.lastname;
                    document.getElementById('ciudad').value = data.city;
                    document.getElementById('direccion').value = data.address;
                    document.getElementById('correo').value = data.email;
                    document.getElementById('telefono').value = data.phone;
                } else {
                    // Limpia los campos si los datos no existen o son undefined
                    document.getElementById('nombres').value = '';
                    document.getElementById('apellidos').value = '';
                    document.getElementById('ciudad').value = '';
                    document.getElementById('direccion').value = '';
                    document.getElementById('correo').value = '';
                    document.getElementById('telefono').value = '';
                }
            })
            .catch(error => console.error('Error:', error));
    });
    </script>




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

<!-- *********************************************** -->