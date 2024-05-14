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
                            <h1 class="m-0">Backup</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Backup</a></li>
                                <li class="breadcrumb-item active">ver backup</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Copia de seguridad y restauración de la base de datos MySQL</h5>
                    <p class="card-text">Haz clic en el botón para crear una copia de seguridad de la base de datos en un archivo .sql.</p>
                    <p><a href="../../../model/admin/model_backup/backup.php" class="btn btn-primary">Crear copia <i class="fas fa-save"></i></a></p>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Restaurar base de datos</h5>
                    <p class="card-text">Seleccione un archivo de restauración (.sql) para restaurar la base de datos.</p>
                    <form action="../../../model/admin/model_backup/Restore.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="restoreFile">Seleccionar archivo de restauración:</label>
                            <input type="file" class="form-control-file" id="restoreFile" name="restoreFile" required>
                        </div>
                        <button type="submit" class="btn btn-success">Restaurar</button>
                    </form>
                </div>
            </div>


            <script>
                document.querySelector("form[action='../../../model/admin/model_backup/Restore.php']").addEventListener("submit", function(event) {
                    event.preventDefault();
                    const fileInput = document.getElementById("restoreFile");
                    const file = fileInput.files[0];
                    const formData = new FormData();
                    formData.append("restoreFile", file);

                    fetch("../../../model/admin/model_backup/Restore.php", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.text())
                        .then(result => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Restauración exitosa!',
                                text: result
                            }).then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error de restauración',
                                text: error.message
                            });
                        });
                });
            </script>
</body>

</html>

<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>


</div>

<script src="../../../view/admin/plugins/jquery/jquery.min.js"></script>
<script src="../../../view/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../view/admin/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php include('../../../view/admin/layouts/footer.php'); ?>


</body>

</html>