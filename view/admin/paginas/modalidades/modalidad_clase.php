<?php
$urlStarter = '../../../view/admin/';  //son desde el controlador
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../../../view/admin/layouts/nav.php'); ?>
        <?php include('../../../view/admin/layouts/nav_aside.php'); ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ver Modalidades</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Modalidades</a></li>
                                <li class="breadcrumb-item active">ver modalidades</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid mt-4" style='max-width:1200px;'>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">

                            <table id="tabla-modalidades" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Modalidad</th>
                                        <th>Precio Hora</th>
                                        <th>Precio Clase</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($modalidades && count($modalidades) > 0) : ?>
                                    <?php foreach ($modalidades as $modalidad) : ?>
                                        <tr id="modalidad-<?php echo $modalidad['id']; ?>">
                                            <td><?php echo $modalidad['name']; ?></td>
                                            <td><?php echo $modalidad['price_hour_student']; ?></td>
                                           
                                            <td><?php echo $modalidad['price_class_student']; ?></td>
                                            <td>
                                                <a href="controller_editar_modalidad.php?id_modalidad=<?php echo $modalidad['id']; ?>" class="btn btn-primary tooltipEdit" title="Editar" data-placement="top">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                              


                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="4">No se encontraron modalidades registradas.</td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <?php include('../../../view/admin/layouts/footer.php'); ?>
    </div>

    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function eliminarModalidad(idModalidad) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminarlo"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'controller_modalidades.php',
                        type: 'POST',
                        data: {
                            id_modalidad: idModalidad
                        },
                        success: function(response) {
                            if (response === 'success') {
                                $('#modalidad-' + idModalidad).remove();
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Modalidad eliminada correctamente!!!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Error al eliminar la modalidad'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error de conexión',
                                text: 'Ha ocurrido un error de conexión'
                            });
                        }
                    });
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // Inicializar el tooltip para cada botón con la clase .tooltipEdit
            $('.tooltipEdit').tooltip({
                placement: 'top'
            });
        });
    </script>

</body>

</html>