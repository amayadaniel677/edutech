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
              <h1 class="m-0">Vincular Area </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container">
          <div class="row justify-content-center">
          <div class="col-md-6">
          <form action="">
    <div class="text-center">
        <div class="card-body">
            <div class="form-group">
                <label for="categoria">Seleccione área:</label>
                <select name="categoria" id="categoria" class="form-control">
                    <option value="daniel">Matemáticas</option>
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-md w-50 mt-3 mx-2">Buscar</button>
                <button type="button" class="btn btn-outline-primary btn-md w-50 mt-3 mx-2">Editar</button>
            </div>
        </div>
    </div>
</form>
            </div>
          </div>
        </div>

        <div class="container mt-4">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Docente</th>
                    <th>Area</th>
                    <th>Desvincular</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Carlos</td>
                    <td>Área</td>
                    <td><button class="btn btn-danger btn-sm ml-4"><i class="fas fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td>Maria</td>
                    <td>Área</td>
                    <td><button class="btn btn-danger btn-sm ml-4"><i class="fas fa-trash"></i></button></td>
                  </tr>
                </tbody>
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
</body>

</html>