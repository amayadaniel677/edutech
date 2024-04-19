<div class="modal fade" id="modal-add-detalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal agregar</h1>
                <button style='border:none; background-color:transparent;' type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="bi bi-x-octagon-fill"></i></button>
            </div>
            <div class="modal-body">

                <div class="col-10">
                    <br>
                    <form action="" class="form" id="detalle-form">
                    <div class="input-group mb-2">
                            <label>Tipo de venta</label>
                            <select class="form-control" id="tipo-venta" name="tipo-venta" style="width: 100%;">
                            <option value="">Seleccione una opción</option>
                                <option value="horas" id='horas'>Venta por horas</option>
                                <option value="clases" id='clases'>Venta por clases</option>
                            </select>
                            </div>
                        <div class="input-group mb-2">
                            <label>Modalidad</label>
                            <select class="form-control" id="modalidad" name="modalidad" style="width: 100%;">
                                <option value="">Seleccione</option>
                                <?php
                                    if(isset($modalidades)){
                                        foreach($modalidades as $modalidad){
                                            // en el option guardar el valor del precio y el id de la modalidad en data-id
                                            echo "<option value='".$modalidad['name']."' data-pricehour='".$modalidad['price_hour_student']."' data-priceclass='".$modalidad['price_class_student']."'>".$modalidad['name']."</option>";
                                            
                                           
                                        }
                                    }
                                
                                ?>
                            </select>
                            </div>
                        <div class="input-group mb-2">
                            <label>Categoria</label>
                            <select class="form-control" id="categoria-curso" name="categoria-curso" style="width: 100%;">
                                <option value="categoria">Seleccione</option>
                                <?php
                                if (isset($error_message)) {
                                    echo "<option value='categoria' class='alert alert-danger'>Error: $error_message</option>";
                                } else {
                                    if (empty($datosParaVista)) {
                                        echo "<option value=''>modelo existen</option>";
                                    } elseif (!isset($datosParaVista)) {
                                        // Agregar el comando echo aquí
                                        echo "<option value=''>no existe el modelo</option>";
                                    } else {
                                        foreach ($datosParaVista as $nombre) {
                                            echo "<option value='" . $nombre . "'>" . $nombre . "</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <div class="input-group mb-2">
                            <label>Nombre curso</label>
                            <select class="form-control" id="nombre-curso" name="nombre-curso" style="width: 100%;">
                                <option value="curso">Seleccione </option>

                            </select>
                        </div>
                        <label for="cantidad-horas-clases" class="col-sm-2 col-form-label">Cantidad horas/clases:</label> <br>
                        <div class="input-group">
                            <input type="number" class="form-control" id="cantidad-horas-clases" name="cantidad-horas-clases" Pleaceholder="Ingrese la cantidad">
                        </div>

                        <label for="valor-hora-clase" class="col-sm-6 col-form-label">Valor hora/clase:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input readonly type="number" class="form-control" id="valor-hora-clase" name='valor-hora-clase' placeholder="">
                        </div>

                        <label for="valor-unidad" class="col-sm-6 col-form-label">Total del curso:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input readonly type="number" class="form-control" id="valor-unidad" name='valor-unidad' placeholder="">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="agregar-detalle" name="agregar-detalle">Agregar</button>

                </div>
                </form>
            </div>



        </div>
    </div>
</div>