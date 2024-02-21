<?php 
$urlStarter='../../../view/admin/';  //son desde el controlador
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
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link
      rel="stylesheet"
      href="../../../view/admin/plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Theme style -->
    <link
      rel="stylesheet"
      href="../../../view/admin/dist/css/adminlte.min.css"
    />
    <link
      rel="stylesheet"
      href="../../../view/admin/dist/css/adminlte.min.css"
    />
    <!-- CSS CURSOS ADMIN -->
    <link rel="stylesheet" href="../../../resource/css/sales/table.css" />
    <link rel="stylesheet" href="../../../resource/css/sales/form.css" />

    <link
      rel="icon"
      href="../../../resource/img/icons/logo-kepler-removebg-preview.png"
    />
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
                <h1 class="m-0">Agregar curso</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Agregar curso</li>
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
          
            <div>
              <div class="agregarcurso">
                <a href="#">AGREGAR CURSO A LA VENTA<i class="bi bi-plus-circle"></i></a>
                
              </div>

              <article class="container-form-regventa">
                <form action="get">
                  <label class="label-form">
                    ID Cliente
                    <input type="text" placeholder="Escriba aquí..." />
                  </label>
                  <label class="label-form">
                    ID Cliente
                    <input type="text" placeholder="Escriba aquí..." />
                  </label>
                  <label class="label-form">
                    ID Cliente
                    <input type="text" placeholder="Escriba aquí..." />
                  </label>
                  <label class="label-form">
                    ID Cliente
                    <input type="text" placeholder="Escriba aquí..." />
                  </label>
                  <label class="label-form">
                    ID Cliente
                    <input type="text" placeholder="Escriba aquí..." />
                  </label>
                  <label class="label-form">
                    ID Cliente
                    <input type="text" placeholder="Escriba aquí..." />
                  </label>
                </form>
              </article>
              <section class="main-table">
                <article class="table-header">
                  <h2>REGISTRO DE VENTAS</h2>
                </article>
                <article class="table-body">
                  <table class="table-regventa">
                    <thead class="head-table">
                      <tr>
                        <th>Id</th>
                        <th>Curso</th>
                        <th>Horas</th>
                        <th>Valor hora</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="tr-impar">
                        <td>1</td>
                        <td class="banner-curso">
                          <img src="https://cdn.colombia.com/sdi/2020/03/28/cursos-virtuales-del-sena-sofia-plus-para-formarse-en-casa-821989.jpg" alt="" />
                          <div class="curso-txt">
                            <h5>Nombre curso</h5>
                            <div>
                              <p>15 cupos disponibles</p>
                              <p>ID 2615133</p>
                            </div>

                            <div class="curso-dto">
                              <i class="bi bi-shop-window"></i>
                              <p>20%<span> descuento</span></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="horas">
                            <div class="add-horas">
                             <input type="number">
                            </div>
                          </div>
                        </td>
                        <td>15000</td>
                        <td><span>$320000</span> $250000</td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td class="banner-curso">
                          <img src="https://cdn.colombia.com/sdi/2020/03/28/cursos-virtuales-del-sena-sofia-plus-para-formarse-en-casa-821989.jpg" alt="" />
                          <div class="curso-txt">
                            <h5>Nombre curso</h5>
                            <div>
                              <p>15 cupos disponibles</p>
                              <p>ID 2615133</p>
                            </div>

                            <div class="curso-dto">
                              <i class="bi bi-shop-window"></i>
                              <p>20%<span> descuento</span></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="horas">
                            <div class="add-horas">
                            <input type="number">
                            </div>
                          </div>
                        </td>
                        <td>15000</td>
                        <td><span>$320000</span> $250000</td>
                      </tr>
                      <tr class="tr-impar">
                        <td>1</td>
                        <td class="banner-curso">
                          <img src="https://cdn.colombia.com/sdi/2020/03/28/cursos-virtuales-del-sena-sofia-plus-para-formarse-en-casa-821989.jpg" alt="" />
                          <div class="curso-txt">
                            <h5>Nombre curso</h5>
                            <div>
                              <p>15 cupos disponibles</p>
                              <p>ID 2615133</p>
                            </div>

                            <div class="curso-dto">
                              <i class="bi bi-shop-window"></i>
                              <p>20%<span> descuento</span></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="horas">
                            <div class="add-horas">
                            <input type="number">
                            </div>
                          </div>
                        </td>
                        <td>15000</td>
                        <td><span>$320000</span> $250000</td>
                      </tr>
                      <tr class="">
                        <td>1</td>
                        <td class="banner-curso">
                          <img src="https://cdn.colombia.com/sdi/2020/03/28/cursos-virtuales-del-sena-sofia-plus-para-formarse-en-casa-821989.jpg" alt="" />
                          <div class="curso-txt">
                            <h5>Nombre curso</h5>
                            <div>
                              <p>15 cupos disponibles</p>
                              <p>ID 2615133</p>
                            </div>

                            <div class="curso-dto">
                              <i class="bi bi-shop-window"></i>
                              <p>20%<span> descuento</span></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="horas">
                            <div class="add-horas">
                            <input type="number">
                            </div>
                          </div>
                        </td>
                        <td>15000</td>
                        <td><span>$320000</span> $250000</td>
                      </tr>
                    
                    </tbody>
                  </table>
                </article>
              </section>
            
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
    <!-- AdminLTE App -->
    <script src="../../../view/admin/dist/js/adminlte.min.js"></script>
  </body>
</html>
