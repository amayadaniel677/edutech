<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <!-- SwadeetAlert2 -->
    <link rel="stylesheet" href="../../../view/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- css alertas mensajes -->
    <link rel="stylesheet" href="../../../resource/css/mensajes_alertas/mensajes_alertas.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../../view/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../view/admin/dist/css/adminlte.min.css">
    <link rel="icon" href="../../../resource/img/icons/logo-kepler-removebg-preview.png" />
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
                            <h1 class="m-0">Buscar Area </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Areas</a></li>
                                <li class="breadcrumb-item active">Buscar area</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <button id="btnSuccess" type="button" class="btn btn-success swalDefaultSuccess" style="display:none"></button>
                <button id="btnError" type="button" class="btn btn-success swalDefaultError" style="display:none "></button>


                <div class="container-fluid" style='max-width:1000px;'>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="categoria">Seleccione área:</label>
                                            <select name="categoria" id="categoria" class="form-control">
                                                <?php
                                                // agregar un valor por defecto
                                                echo "<option value=''>Seleccionar área</option>";
                                                foreach ($areas as $area) {
                                                    echo "<option value='" . $area['id'] . "'>" . $area['id'], " ", $area['name'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-md mt-3 ">Buscar</button>
                                            <button type="button" class="btn btn-outline-primary  mt-3" data-toggle="modal" data-target="#crearAreaModal">
                                                Crear Area <i class="fas fa-plus"></i>
                                            </button>

                                            <!-- Modal -->


                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container-fluid mt-4" style='max-width:1200px;'>
                    <div class="row">
                        <div class="card col-md-9">
                            <div class="card-header">
                                <h2> AREA: <?php if (isset($areaSelect['name']) && !empty($areaSelect['name'])) {
                                                echo $areaSelect['name'];
                                                echo "
       <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-edit-area'>
       Editar Area <i class='fas fa-edit'></i>  </button>
       ";
                                                if ($areaSelect['status'] == 'active') {
                                                    echo "<button onclick=\"confirmarAccion('desactivar', " . $areaSelect['id'] . ")\" class='btn btn-danger btn-sm ml-4'><i class='fas fa-trash'></i> Desactivar área</button>";
                                                } else {
                                                    echo "<button onclick=\"confirmarAccion('activar', " . $areaSelect['id'] . ")\" class='btn btn-success btn-sm ml-4'><i class='fas fa-check'></i> Activar área</button>";
                                                }
                                            } else {
                                                echo "Nombre de la materia";
                                            }; ?>
                                </h2>
                                <h5><?php if (isset($areaSelect['status']) && !empty($areaSelect['status'])) {
                                        echo "Estado:" . $areaSelect['status'];
                                    } else {
                                        echo "Estado:";
                                    }; ?>
                                </h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Docente</th>
                                            <th>Area</th>

                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($vinculados) && (is_array($vinculados) || is_object($vinculados))) {
                                            foreach ($vinculados as $vinculado) {
                                                echo "<tr>";
                                                echo "<td>" . $vinculado['people_name'] . "</td>";
                                                echo "<td>" . $vinculado['area_name'] . "</td>";
                                                echo "<td>
    <button onclick=\"confirmarDesvinculacion('" . $vinculado['people_area_id'] . "', '" . $vinculado['area_id'] . "')\" class='btn btn-danger btn-sm ml-4'>
        <i class='fas fa-trash'></i> Desvincular
    </button>
</td>";


                                                echo "</tr>";
                                            }
                                        } else {
                                            // Manejar el caso en que $vinculados no es un array o un objeto iterable
                                            echo "No hay docentes vinculados a esta área.";
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item active"><a class="page-link" href="?pagina=1">1</a></li>
                                    <li class="page-item "><a class="page-link" href="?pagina=2">2</a></li>
                                    <li class="page-item "><a class="page-link" href="?pagina=3">3</a></li>
                                    <li class="page-item"><a class="page-link" href="?pagina=2">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Título con el nombre de la materia -->

                            <!-- modal editar -->
                            <!-- Modal -->
                            <div class="modal fade" id="modal-edit-area" tabindex="-1" role="dialog" aria-labelledby="modalMateriaLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalMateriaLabel">EDITAR AREA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí puedes incluir el contenido del modal, como formularios para editar la materia -->
                                            <form action="controller_buscar_area.php" method='POST' id='form-edit'>
                                                <div class="form-group">
                                                    <input required type="hidden" name="idArea" id="idArea" class="form-control" value="<?php if (isset($area)) {
                                                                                                                                            echo $areaSelect['id'];
                                                                                                                                        } ?>">
                                                    <label for="nombre">Nombre del area:</label>
                                                    <input required type="text" name="nombre" id="nombre" class="form-control" value="<?php if (isset($area)) {
                                                                                                                                            echo $areaSelect['name'];
                                                                                                                                        } ?>">
                                                </div>

                                                <!-- agregar estado dependiendo de su valor en la BD -->
                                                <div class="form-group
                        ">
                                                    <label for="status">Estado:</label>
                                                    <select name="status" id="estado" class="form-control">
                                                        <option value="active" <?php if (isset($areaSelect['status']) && $areaSelect['status'] == 'active') {
                                                                                    echo 'selected';
                                                                                } ?>>Activo</option>
                                                        <option value="inactive" <?php if (isset($areaSelect['status']) && $areaSelect['status'] == 'inactive') {
                                                                                        echo 'selected';
                                                                                    } ?>>Inactivo</option>
                                                    </select>                                


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <input type="submit" class="btn btn-primary" id='btn-edit'>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- modal de agregar area -->
            <div class="modal fade" id="crearAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="controller_buscar_area.php" method='POST'>
                                <div class="form-group row">
                                    <label for="nombre_area" class="col-sm-4 col-form-label">Nombre del Area: </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre_area" id="nombre_area" placeholder="Escriba el nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre_area_2" class="col-sm-4 col-form-label">Confirmar nombre del
                                        Area: </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre_area_2" id="nombre_area_2" placeholder="Confirmar el nombre" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group text-center ">
                                    <button type="submit" id='btn-agregar-area' class="btn btn-primary btn-md w-50 mt-3">Agregar</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <?php include('../../../view/admin/layouts/footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('form-edit').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevenir el envío por defecto del formulario
            Swal.fire({
                title: '¿Estás seguro de querer editar el área?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, editar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, proceder con el envío del formulario
                    this.submit();
                }
            });
        });
    </script>
    <script>
        function confirmarDesvinculacion(id_people_area, area_id) {
            Swal.fire({
                title: '¿Estás seguro de desvincular el docente?',
                text: "Podrás volver a vincularlo en la vista de vincular docente",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#3085d6',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Sí, desvincular'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'controller_desvincular_docente.php?id_people_area=' + id_people_area +
                        '&area_id=' + area_id;
                }
            })
        }

        function confirmarAccion(accion, id_area) {
            const urlBase = accion === 'activar' ? 'controller_buscar_area.php?id_area_activar=' :
                'controller_buscar_area.php?id_area_desactivar=';
            Swal.fire({
                title: '¿Estás seguro de cambiar el estado del area?',
                text: "Esta acción podría afectar el catalogo de cursos",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#' + (accion === 'activar' ? '28a745' : 'dc3545'),
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, ' + (accion === 'activar' ? 'activar' : 'desactivar')
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlBase + id_area;
                }
            });
        }
    </script>

    <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
    <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- sweet alert -->
    <script src="../../../view/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

    <?php
    $mensaje = $mensaje ?? ''; // Asegura que $mensaje_editar esté definido
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
                    title: '<?php echo $mensaje; ?>'

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
            <?php if (isset($mensaje) && !empty($mensaje)) : ?>
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
    <!-- confirmaciones sweet alert -->
    <script>

    </script>
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>