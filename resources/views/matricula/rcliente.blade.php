<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-2" id="reg-cliente-modal">

    <form  method="POST" action="{{route('cliente.store2')}}" class="row">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crea un cliente</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion">
                    </div>
                    <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="Masculino" selected>Masculino</option>
                            <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                    </div>
                                
                    <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Nombre Estudiante/Representante</label>
                        <input type="text" class="form-control" name="nombres" id="nombres">
                    </div>
                    <br>

                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono">
                    </div>
                    <br>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tipo Documento</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control">
                                <option value="DNI" selected>DNI</option>
                            <option value="RUC">RUC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label"># Documento</label>
                        <input type="text" class="form-control" name="documento" id="documento">
                    </div>
                    <br>


                    @csrf
                    <div class="col-md-12" style="margin-top: 30px;">
                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i>Grabar
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>

</div>