<section class="content">
    <?php if(isset($curso1) && is_array($curso1)) : ?>
        <div class="row">
            <div class="col-12 col-sm-6" >
                <h3 class="d-inline-block d-sm-none"><?php echo $curso1['subject_name']; ?></h3>
                <div class="col-12">
                    <img src="<?php echo $ruta_inicio.$curso1['photo']; ?>" class="product-image" alt="Product Image">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $curso1['subject_name']; ?></h3>
                <p><?php echo $curso1['description']; ?></p>
                <hr>
                <h3 class="my-3">Horarios</h3>
                <p>Días: Lunes a sábado</p>
                <p>Hora: 8:00 am - 6:00 pm</p>
                <div class="bg-gray py-2 px-3 mt-4">
                    <h4 class="mt-0">
                        <small>Precio por hora: <?php echo $curso1['price']; ?></small>
                    </h4>
                </div>
                <form action="../../controller/estudiante/controller_carrito_compras.php" method="POST">
                    <!-- Formulario para agregar al carrito -->
                    <div class="form-group">
                        <label for="hours">Cantidad de horas: </label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="hours" name="hours" min="1">
                            <input type="hidden" name="subject_id" value="<?php echo $curso1['subject_id']; ?>">
                            <input type="hidden" name="subject_name" value="<?php echo $curso1['subject_name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $curso1['price']; ?>"> 
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Agregar al Carrito
                        </button>
                    </div>
                </form>

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
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $curso1['description']; ?></div>
            <div class="tab-pane fade active show" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, non! Quidem labore voluptates aut amet numquam error? Placeat, enim quasi. Optio cumque id, odit dolorum laboriosam velit fugit. Voluptates, voluptatum?</div>
            <div class="tab-pane fade " id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                <?php
                if (!empty($docentes)) {
                    foreach ($docentes as $docente) {
                        echo "<p>{$docente['docente']}</p>"; // Mostrar el nombre del docente
                    }
                } else {
                    echo "<h4>No se encontraron docentes vinculados para este curso.</h4>";
                }
                ?>
            </div>
        </div>
    <?php else : ?>
        <p>No se encontraron detalles para este curso.</p>
    <?php endif; ?>
</section>
