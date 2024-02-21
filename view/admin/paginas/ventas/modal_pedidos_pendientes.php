<!-- Modal -->
<div class="modal fade" id="modal-editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal editar</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Kepler S.A.S.
                    <small class="float-right">Fecha hoy: DD/MM/AAAA</small>
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
                     Carrera  14 #18-25<br>
                    Telefono:3123467007<br>
                    Correo: info@kepler.edu.co
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Cliente
                  <address>
                    <strong>Nombre Cliente</strong><br>
                    <strong>1006416081</strong><br>
                    Sogamoso,Boyacá<br>
                    Telefono:3123467007<br>
                    Correo: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  
                  <br>
                  <b>ID pedido</b> 4F3S8J<br>
                  <b>Fecha de pedido:</b> 2/22/2014<br>
                  
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
                      <th>Id producto</th>
                      <th>Nombre</th>
                      <th>Horas</th>
                      <th>Valor unitario</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1010</td>
                      <td>Matematicas</td>
                      <td>40</td>
                      <td>$60.000</td>
                    </tr>
                    <tr>
                      <td>2456</td>
                      <td>Ingles</td>
                      <td>40</td>
                      <td>$60.000</td>
                    </tr>
                    <tr>
                      <td>3098</td>
                      <td>Calculo diferencial</td>
                      <td>100</td>
                      <td>$80.000</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             
            <div class="col-10">
                <br>
            <form class="form">
                  
                  <div class="input-group">
                  <label for="subtotal" class="col-sm-2 col-form-label">Subtotal:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="number" class="form-control" id="subtotal" readonly placeholder="Subtotal" >
                </div>
                <br/>
                  <div class="input-group">
                  <label for="descuento" class="col-sm-2 col-form-label">Descuento:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input  type="number" class="form-control" id="descuento" placeholder="Descuento">
                </div>
                    <br/>
                  <div class="input-group">
                  <label for="total" class="col-sm-2 col-form-label" readonly>Total:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input readonly type="number" class="form-control" id="total" Pleaceholder="total" >
                </div>
                  
                 

                
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"> Confirmar venta</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
           
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal eliminar</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>