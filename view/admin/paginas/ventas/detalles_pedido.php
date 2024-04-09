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
              <h1 class="m-0">Detalles del pedido</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"> Pedidos</li>
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
        <div class="d-flex justify-content-center">

          <!-- Contenido del modal -->
          <div class="invoice p-3 mb-3 col-md-8">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Kepler S.A.S.
                  <?php $fechaHoy = date("Y-m-d"); ?>
                  <small class="float-right">Fecha hoy: <?php echo $fechaHoy; ?></small>
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
              <div class="col-sm-4 invoice-col">
                Cliente
                <address>
                  <?php 
                if (isset($detalles)){

                
                    
                 echo "<strong>{$detalles[0]['people_name']}{$detalles[0]['people_lastname']}</strong><br>" ;
                 echo "<strong>DNI:{$detalles[0]['people_dni']}</strong><br>" ;
                 echo "Ciudad: {$detalles[0]['people_city']}<br>" ;
                echo " Telefono:{$detalles[0]['people_phone']}<br>" ;
                 echo " Correo: {$detalles[0]['people_email']}";
                echo "</address>";
             echo "</div>" ;
             //<!-- /.col -->
            echo "<div class='col-sm-4 invoice-col'> <br>";

               echo "<b>ID pedido</b> {$detalles[0]['order_id']}<br>";
               echo "<b>Fecha de pedido:</b> {$detalles[0]['date']}<br>"; 
               
              }
                ?>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Curso</th>
                      <th>Horas</th>
                      <th>Valor unitario</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $n1 = 1;
                    if ($detalles) {
                      $sumaDetalles=0;
                      foreach ($detalles as $indice => $detalle) {
                        $sumaDetalles+=(int)$detalle['price'];
                        $precioFormateado = '$' . number_format($detalle['price'], 2, '.', ',');

                        echo '<tr>';
                        echo '<td>' . $n1 . '</td>';
                        echo '<td>' . $detalle['subjects_name'] . '</td>';
                        echo '<td>' . $detalle['hours'] . '</td>';
                        echo '<td>' . $precioFormateado . '</td>';
                        echo '</tr>';
                        $n1 += 1;
                      }
                      $sumaDetalles2 =  number_format($sumaDetalles, 2, '.', ',');
                      $detallesJson=json_encode($detalles);
                    }

                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


            <div class="col-10">
              <br>
              <form class="form" action='' method='POST'>
                    <!-- input invisible -->
                    <input type='hidden' class="form-control" name='detallesJson' id="detallesJson" Value='<?php echo $detallesJson; ?>'> 
                    
                <div class="input-group">
                  <label for="subtotal" class="col-sm-2 col-form-label">Subtotal:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control" id="subtotal" value='<?php echo $sumaDetalles; ?>' readonly placeholder="Subtotal">
                </div>
                <br />
                <div class="input-group">
                  <label for="descuento" class="col-sm-2 col-form-label" >Descuento:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="number" class="form-control" id="descuento" Value='0'>
                </div>
                <br />
                <div class="input-group">
                  <label for="total" class="col-sm-2 col-form-label" readonly>Total:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input readonly type="number" class="form-control" name='total' id="total" Pleaceholder="total">
                </div>





                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"> Confirmar venta</button>
                  <a href="controller_pedidos_pendientes.php" class="btn btn-danger">volver</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          
          <!-- /.col -->


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
        totalInput.value = total; // Asegúrate de que el total tenga dos decimales
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