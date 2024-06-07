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
                            <h1 class="m-0">Editar Modalidad</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../controller_inicio_admin.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="#">Modalidades</a></li>
                <li class="breadcrumb-item active">Editar modalidad</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
             <div class="container-fluid"  style="max-width:1000px;">
                <h2>Modalidad <?php echo $datos_modalidad['name']; ?></h2> <!-- Título del formulario -->
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="price_hour_student">Precio por hora para estudiante</label>
                        <input type="number" class="form-control" id="price_hour_student" name="price_hour_student" value="<?php echo $datos_modalidad['price_hour_student']; ?>" placeholder="Introduce el precio por hora" required>
                    </div>
                    <div class="form-group">
                        <label for="price_class_student">Precio por clase para estudiante</label>
                        <input type="number" class="form-control" id="price_class_student" name="price_class_student" value="<?php echo $datos_modalidad['price_class_student']; ?>" placeholder="Introduce el precio por clase" required>
                    </div>
                
                    <input type="hidden" id="id-modalidad" name="id" value="<?php echo $datos_modalidad['id']; ?>"> <!-- Campo oculto -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </section>
        </div>
        <?php include('../../../view/admin/layouts/footer.php'); ?>
        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            <?php if (isset($msg)) : ?>
                Swal.fire({
                    title: '¿Seguro de hacer los cambios?',
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Modalidad actualizada con éxito!',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = 'controller_modalidades.php';
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire('Cambios no guardados', '', 'info');
                    }
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>