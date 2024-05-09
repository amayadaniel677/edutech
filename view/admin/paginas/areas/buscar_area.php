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
        <?php if (!empty($mensaje)) : ?>
          <div class="alert alert-success">
            <?php echo  $mensaje  ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($error)) : ?>
          <div class="alert alert-danger">
            <?php echo  $error; ?>
          </div>
        <?php endif; ?>
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
                      <button type="submit" class="btn btn-success btn-md w-50 mt-3 ">Buscar</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="container-fluid mt-4" style='max-width:1000px;'>
          <div class="row">
            <div class="card col-md-9">
              <div class="card-header">
                <h2> AREA: <?php if (isset($areaSelect['name']) && !empty($areaSelect['name'])) {
                              echo $areaSelect['name'];
                              echo "
       <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-edit-area'>
         <i class='fas fa-edit'></i>
       ";
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
                        echo "<td><a href='controller_desvincular_docente.php?id_people_area=" . $vinculado['people_area_id'] . "' class='btn btn-danger btn-sm ml-4'><i class='fas fa-trash'></i></a></td>";
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
                      <h5 class="modal-title" id="modalMateriaLabel">NOMBRE AREA</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Aquí puedes incluir el contenido del modal, como formularios para editar la materia -->
                      <form action="" method='POST' id='form-edit'>
                        <div class="form-group">
                          <input required type="text" name="idArea" id="idArea" class="form-control" value="<?php if (isset($area)) {
                                                                                                              echo $areaSelect['id'];
                                                                                                            } ?>">
                          <label for="nombre">Nombre del area:</label>
                          <input required type="text" name="nombre" id="nombre" class="form-control" value="<?php if (isset($area)) {
                                                                                                              echo $areaSelect['name'];
                                                                                                            } ?>">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Precio del area:</label>
                          <input required type="number" name="precio" id="precio" class="form-control" value="<?php if (isset($area)) {
                                                                                                                echo $areaSelect['price'];
                                                                                                              } ?>">
                        </div>
                        <!-- agregar estado dependiendo de su valor en la BD -->
                        <div class="form-group
                        ">
                          <label for="estado">Estado:</label>
                          <select name='status' id="estado" class="form-control">
                            <!-- agregar selected si  $vinculados[0]['area_status'] es active o inactive -->
                            <option value="active" <?php if (isset($areaSelect) && $areaSelect['status'] == 'active') {
                                                      echo 'selected';
                                                    } ?>>Activo</option>
                            <option value="inactive" <?php if (isset($areaSelect) && $areaSelect['status'] == 'inactive') {
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
  <script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
  <script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
</body>

</html>