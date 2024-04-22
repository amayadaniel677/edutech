<?php 
include('../../model/estudiante/carrito_compras_model.php');
$carrito = new Carrito_compras();
$cursos_en_carrito = $carrito->Mostrar_curso();



?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="controller_inicio_estudiante.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="controller_cursos_estudiante.php" class="nav-link">Cursos</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="controller_catalogo_estudiante.php" class="nav-link">Catalogo</a>
      </li>
      <li>
        
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4 fa-2x mx-auto" viewBox="0 0 16 16" data-toggle="modal" data-target="#exampleModal" type="button">
    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg>
<?php if(isset($_SESSION['total_cursos']) && $_SESSION['total_cursos'] > 0 && isset($cursos_en_carrito)) : ?>
        <span class="badge badge-danger"><?php echo $_SESSION['total_cursos']; ?></span>
    <?php endif; ?>

<!-- Modal -->
 

      </li>
    </ul>
        
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
   


      <!-- cerrar sesion Dropdown Menu -->
      <li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="far fa-user-circle"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo $ruta_inicio . $_SESSION['photo_session'] ; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $_SESSION['name_session'] ; ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Estudiante</p>
                <p class="text-sm">Activo</p>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>editar perfil
          </a>
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="<?php echo $ruta_inicio . 'controller/controller_cerrar_sesion.php?clickcerrar=' . urlencode(true); ?>" onclick="" class="dropdown-item dropdown-footer">Cerrar sesión</a>

        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Carrito de Compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <?php if (!empty($cursos_en_carrito)) : ?>
    <ul class="list-group">
        <?php
        $total_pago = 0; // Inicializamos el total de pago
        foreach ($cursos_en_carrito as $curso) :
            $monto_individual = $curso['price'] * $curso['hours']; // Calculamos el monto individual para este curso
            $total_pago += $monto_individual; // Sumamos este monto al total de pago
        ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $curso['name']; ?> - <?php echo $curso['hours']; ?> horas
                <p> Precio: <?php echo $curso['price']; ?></p>
                <p> Monto: <?php echo $monto_individual; ?></p> <!-- Mostramos el monto individual -->
                <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminacion(<?php echo $curso['id']; ?>)">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </li>
        <?php endforeach; ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <strong>Total a pagar:</strong>
            <span>$ <?php echo $total_pago; ?></span> <!-- Mostramos el total de pago -->
        </li>
    </ul>
<?php else : ?>
    <p>El carrito está vacío.</p>
<?php endif; ?>

<div class="modal-footer">
    
       
<form action="../../controller/estudiante/controller_carrito_compras.php" method="POST" onsubmit="return confirmacion()">
    <button type="submit" name="vaciar_carrito" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
            <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793z"/>
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
        </svg>
        Vaciar Carrito
    </button>
</form>

<script>
    function confirmacion() {
        return confirm("¿Estás seguro de que deseas vaciar el carrito?");
    }
</script>

    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
   
</div>

        </div>
    </div>
</div>

<script>
        function confirmacion() {
        return confirm("¿Estás seguro de que deseas vaciar el carrito?");
    }

        function confirmarEliminacion(cursoId) {
            if (confirm("¿Estás seguro de que deseas eliminar este curso?")) {
                // Si el usuario confirma, redirige al controlador para eliminar el producto
                window.location.href = "../../controller/estudiante/controller_carrito_compras.php?id=" + cursoId;
            } else {
                // Si el usuario cancela, no hagas nada
                return false;
            }
        }
       
    </script>



