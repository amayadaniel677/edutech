<div class="modal fade" id="modal-add-detalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal eliminar</h1>
                <button style='border:none; background-color:transparent;' type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="bi bi-x-octagon-fill"></i></button>
            </div>
            <div class="modal-body">
                
<div class="col-10">
                <br>
            <form class="form ">
            <div class="form-group " >
              <label>Categoria</label>
              <select class="form-control" id="categoria-curso" name="categoria-curso"style="width: 100%;">
                <option value="categoria">Seleccione </option>
                <option value="categoria"> Categoria 1 </option>
                <option value="categoria"> Categoria 2</option>
                <option value="categoria"> Categoria 3</option>
                <option value="categoria"> Categoria 4</option>
              </select>
              <br>
             
            </div>
            <div class="form-group">
              <label>Nombre curso</label> 
              <select class="form-control" id="nombre-curso" name="nombre-curso"style="width: 100%;">
                <option value="categoria">Seleccione </option>
                <option value="categoria"> curso 1 </option>
                <option value="categoria"> curso 2</option>
                <option value="categoria"> curso 3</option>
                <option value="categoria"> curso 4</option>
              </select>
              <br>
            </div>
            <label for="horas" class="col-sm-2 col-form-label" >Horas:</label> <br>
                  <div class="input-group">
                  <input  type="number" class="form-control" id="horas" name="horas "Pleaceholder="Ingrese la cantidad"  >
                </div>
                <br/>
                 <label for="valor-unidad" class="col-sm-6 col-form-label">Valor unitario:</label>
                 <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input  readonly type="number" class="form-control" id="valor-unidad" name='valor-unidad' placeholder="">
                </div>
                    <br>
                    

</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


