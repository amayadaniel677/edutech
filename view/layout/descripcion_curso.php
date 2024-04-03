<section class="content">
    <?php if(isset($curso) && is_array($curso)) : ?>
        <div class="row">
            <div class="col-12 col-sm-6" >
                <h3 class="d-inline-block d-sm-none"><?php echo $curso['subject_name']; ?></h3>
                <div class="col-12">
                    <img src="../../<?php echo $curso['photo']; ?>" class="product-image" alt="Product Image">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $curso['subject_name']; ?></h3>
                <p><?php echo $curso['description']; ?></p>
                <hr>
                <h3 class="my-3">Horarios</h3>
                <p>Días: Lunes a sábado</p>
                <p>Hora: 8:00 am - 6:00 pm</p>
                <div class="bg-gray py-2 px-3 mt-4">
                    <h4 class="mt-0">
                        <small>Precio por hora: <?php echo $curso['price']; ?></small>
                    </h4>
                </div>
                <div class="mt-4">
                    <div class="btn btn-primary btn-lg btn-flat">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                        Agregar Carrito
                    </div>
                </div>
                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Descripción</a>
                <a class="nav-item nav-link active" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="true">Recomendaciones</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Docentes</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $curso['description'];?> </div>
              <div class="tab-pane fade active show" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, non! Quidem labore voluptates aut amet numquam error? Placeat, enim quasi. Optio cumque id, odit dolorum laboriosam velit fugit. Voluptates, voluptatum? </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
              <?php
   if (!empty($docentes)) {
    foreach ($docentes as $docente) {
        echo "<h5>{$docente['docente']}</h5>"; // Mostrar el nombre del docente
    }
} else {
    echo "<h4>No se encontraron docentes vinculados para este curso.</h4>";
}
?>
    
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                <h2>docentes </h2>
    
</div>
  

</div>

              </div>
            </div>
          </div>
        
    <?php else : ?>
        <p>No se encontraron detalles para este curso.</p>
    <?php endif; ?>
</section>