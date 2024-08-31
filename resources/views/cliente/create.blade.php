@extends('layout.plantilla')

@section('titulo','Nuevos Clientes')

@section("cabecera","Administración de Clientes")

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevos Clientes</h1>
        <form method="POST" action="{{route('cliente.store')}}" class="row g-3">
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



            <div class="col-md-12" style="margin-top: 30px;">
                <button class="btn btn-primary">
                    <i class="fa fa-save"></i>Grabar
                </button>
                <a href="{{route('cancelar.cliente')}}" class="btn btn-danger">
                    <i class="fas fa-ban"></i>Cancelar</a>
              </div>
            <br>
            
        </form>
    </div>
@endsection