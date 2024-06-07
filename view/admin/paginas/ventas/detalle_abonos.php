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

    <title>EduTech | Pedidos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css" />
    <!-- CSS CURSOS ADMIN -->
    <!-- <link rel="stylesheet" href="../../../resource/css/sales/pedidos.css" /> -->

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
                            <h1 class="m-0">Detalles de venta</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="./controller_ventas.php">Ventas</a></li>
                                <li class="breadcrumb-item"><a href="./controller_saldos_pendientes.php">Saldos
                                        pendientes</a></li>
                                <li class="breadcrumb-item active">Abonos realizados</li>
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
            <section class="content">
                <div class="container-fluid" style="max-width:1000px;">

                    <!-- Contenido del modal -->
                    <div class="invoice p-3 mb-3 col-md-11">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Kepler S.A.S.
                                    <small class="float-right">Fecha hoy: <?php echo date('d/m/Y'); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Empresa
                                <address>
                                    <strong>Kepler, S.A.S.</strong><br>
                                    Sogamoso-Boyacá <br>
                                    Carrera 14 #18-25<br>
                                    Telefono:3123467007<br>
                                    Correo: info@kepler.edu.co
                                </address>
                            </div>
                            <!-- /.col -->
                            <?php
                            if ($usuario) {
                            ?>
                                <div class="col-sm-4 invoice-col">

                                    <address>
                                        <div class="">
                                            <strong>Cliente:</strong> <span><?php echo $usuario['name']; ?></span>
                                            <span class="ml-1"><?php echo $usuario['lastname']; ?></span>
                                            <br>
                                        </div>
                                        <strong>Dni: </strong> <?php echo $usuario['dni']; ?><br>
                                        <strong>
                                            Ubicación:
                                        </strong><?php echo $usuario['address'] . " " . $usuario['city']; ?><br>
                                        <strong>Telefono:</strong> <?php echo $usuario['phone']; ?><br>
                                        <strong>Correo:</strong> <?php echo $usuario['email']; ?>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-2 invoice-col">
                                    <br>
                                    <b>ID VENTA</b> <?php echo $usuario['sales_id']; ?><br>
                                    <img src="../../../<?php echo $usuario['photo']; ?>" class="rounded-circle img-fluid w-50" alt="Foto de usuario">
                                </div>
                                <!-- /.col -->
                            <?php
                            }
                            ?>
                            <!-- /.row -->




                            <div class="col-10">
                                <br>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Id venta</th>
                                                            <th>Valor abonado</th>
                                                            <th>Fecha de abono (AAAA-MM-DD)</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (isset($detalles_abonos) and !empty($detalles_abonos)) : ?>
                                                            <?php $contador = 1; ?>
                                                            <?php foreach ($detalles_abonos as $detalle) : ?>
                                                                <?php
                                                                     $formatted_date = $detalle['date'];
                                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $contador ?></td>
                                                                    <td><?php echo htmlspecialchars($detalle['sales_id']); ?>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($detalle['amound_paid']); ?>
                                                                    </td>
                                                                    <td><?php echo $formatted_date; ?>
                                                                    </td>

                                                                </tr>
                                                                <?php $contador++; ?>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="4">No hay abonos registrados</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- /.col -->


                        </div>
                        <a href="controller_saldos_pendientes.php" class="btn btn-danger">Volver</a>
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
    <!-- CALCULAR EL TOTAL DE DETALLES -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtén los elementos del DOM
            var subtotalInput = document.getElementById('subtotal');
            var descuentoInput = document.getElementById('descuento');
            var totalInput = document.getElementById('total');

            // Función para calcular el total
            function calcularTotal() {
                var subtotal = parseFloat(subtotalInput.value) || 0;
                var descuento = parseFloat(descuentoInput.value) || 0;
                var total = subtotal - descuento;
                totalInput.value = total.toFixed(2); // Asegúrate de que el total tenga dos decimales
            }

            // Escucha el evento 'input' en el campo de descuento
            descuentoInput.addEventListener('input', calcularTotal);

            // Calcula el total inicialmente
            calcularTotal();
        });
    </script>
    <!-- alert eliminar pedido -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- alert eliminar pedido -->
    <!-- <script src="../../../resource/js/admin/ventas/alert_pedidos_pendientes.js"></script> -->
    <!-- jQuery -->
    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Scripts de Bootstrap (asegúrate de tenerlos incluidos) -->
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>