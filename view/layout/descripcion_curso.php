<section class="content">
    <?php if (isset($curso1) && is_array($curso1)) : ?>
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?php echo $curso1['subject_name']; ?></h3>
                <div class="col-12">

                    <img src="<?php echo $ruta_inicio . $curso1['photo']; ?>" class="product-image" alt="Product Image">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $curso1['subject_name']; ?></h3>
                <p><?php echo $curso1['description']; ?></p>
                <hr>
                <h3 class="my-3">TEMAS</h3>
                <ul>
                    <?php foreach ($curso1['topics_array'] as $topic) : ?>
                        <li><?php echo $topic; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php if ($_SESSION['rol_session'] == 'estudiante') : ?>
                    <form action="../../controller/estudiante/controller_carrito_compras.php" method="POST">
                        <div class="form-group">
                            <label for="hours">Cantidad de horas:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="hours" name="hours" min="1">
                                <input type="hidden" name="subject_id" value="<?php echo $curso1['subject_id']; ?>">
                                <input type="hidden" name="subject_name" value="<?php echo $curso1['subject_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Agregar al Carrito
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
                <a type="button" href='https://wa.me/+573123467007?text=Hola,%20Estoy%20interesado%20en%20sus%20cursos%20' class="btn-animado animacion-cuatro color-instagram">
                    <!-- icono whatsapp -->
                    <i class="fab fa-whatsapp"></i>
                    <span class="tex-icono">Chatea con nosotros</span>
                </a>
                <?php
                if($_SESSION['rol_session'] == 'administrador'){
                   echo ' <br>'; 
                   echo '<a class="btn btn-primary btn-lg" href="#" data-toggle="modal" data-target="#miModal"><i class="fas fa-edit"></i> Modificar curso</a>';
                }    
                ?>
                <!-- Modal  modificar cursos-->
                <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modificar Curso</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="tu_url_para_enviar_el_formulario" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id_curso;?>">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?php echo $curso['name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="<?php echo $curso['description'];?>"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="temas">Temas</label>
                                        <textarea class="form-control" id="temas" name="temas" placeholder="<?php echo $curso['topics'];?>"></textarea>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="" id="foto" name="foto" accept='image/*'>
                                        <label class="custom-file-label" for="foto">Seleccionar archivo</label>
                                    </div>
                                    <div class="d-flex justify-content-between mt-5">
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>

                                </form>
                            </div>

                        </div>
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
        <h3 class="mt-4">Cursos sugeridos</h3>
        <!-- Carrusel de cursos relacionados -->
        <div class="mb-3 col-md-6 p-3 rounded">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: #f2f2f2;">
                <div class="carousel-inner">
                    <?php foreach ($cursos_area as $index => $curso2) : ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="border p-3 mx-auto curso-container" style="max-width: 300px; margin-top:5px; margin-bottom: 5px; background: linear-gradient(to bottom, #7FFFD4, #40E0D0); border-radius:7px;">
                                <article class="materias">
                                    <a href="controller_descripcion_curso_estudiante.php?id_curso=<?php echo $curso2['subject_id']; ?>">
                                        <div class="curso" style="height: 120px; position: relative; border-radius: 10px; display: flex; align-items: center;">
                                            <img src="<?php echo $ruta_inicio . $curso2['photo']; ?>" style="height: 100%; object-fit: cover; margin: auto;" alt="Curso Image">
                                        </div>
                                        <h5 class="text-center mt-3"><?php echo $curso2['subject_name']; ?></h5>
                                    </a>
                                    <div class="adquirir-button text-center">
                                        <a href="controller_descripcion_curso.php?id_curso=<?php echo $curso2['subject_id']; ?>" style="color: white;">ADQUIRIR</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Recomendaciones</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Docentes</a>
                    <a class="nav-item nav-link" id="product-price-tab" data-toggle="tab" href="#product-price" role="tab" aria-controls="product-price" aria-selected="false">Precio</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $curso1['description']; ?></div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    <h3>Recomendaciones para seguir un curso</h3>
                    <ol>
                        <li><strong>Establece objetivos claros:</strong> Antes de comenzar el curso, define qué es lo que esperas lograr al finalizarlo.</li>
                        <!-- Otras recomendaciones -->
                    </ol>
                </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    <div class="text-center">
                        <?php if (!empty($docentes)) : ?>
                            <h3>Docentes</h3>
                            <ul class="list-unstyled">
                                <?php foreach ($docentes as $docente) : ?>
                                    <li><?php echo $docente['docente'] . ' ' . $docente['lastname'];  ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <h4>No se encontraron docentes vinculados para este curso.</h4>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="tab-pane fade" id="product-price" role="tabpanel" aria-labelledby="product-price-tab">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>TIPO</th>
                                <th>Precio por hora</th>
                                <th>Precio por clase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí puedes agregar filas con los cursos y sus precios -->
                            <?php foreach ($mostrar_precio as $precio) : ?>
                                <tr>
                                    <td><?php echo $precio['name']; ?> </td>
                                    <td><?php echo $precio['p_student']; ?></td>
                                    <td><?php echo $precio['p_class']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <!-- Y así sucesivamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>








    <?php else : ?>
        <p>No se encontraron detalles para este curso.</p>
    <?php endif; ?>
</section>