@extends('layout.plantilla')

@section('titulo','Editar Clientes')

@section("cabecera","Administración de Clientes")

@section('contenido')
    <div class="container">
        <h1>Editar Clientes</h1>
        <form method="POST" action="{{route('cliente.update',$cliente->idCliente)}}" class="row g-3">
            @method('put')
            @csrf
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Código</label>
                <input type="text" class="form-control" name="id" id="d"  value="{{$cliente->idCliente}}" disabled>
              </div>
            <br>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" id="direccion" value="{{$cliente->direccion}}">
              </div>
            <br>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        @if(   "Femenino" === $cliente->sexo   )
                            <option selected value="Femenino">Femenino</option>
                        @else
                            <option value="Femenino">Femenino</option>
                        @endif
                        @if(   "Masculino" === $cliente->sexo   )
                            <option selected value="Masculino">Masculino</option>
                        @else
                            <option value="Masculino">Masculino</option>
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" value="{{$cliente->telefono}}">
              </div>
            <br>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Nombre Estudiante/Representante</label>
                <input type="text" class="form-control" name="nombres" id="nombres" value="{{$cliente->nombres}}">
              </div>
            <br>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tipo Documento</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control">
                        @if(   "RUC" === $cliente->tipo_documento   )
                            <option selected value="RUC">RUC</option>
                        @else
                            <option selected value="RUC">RUC</option>
                        @endif

                        @if(   "DNI" === $cliente->tipo_documento   )
                            <option selected value="DNI">DNI</option>
                        @else
                            <option selected value="DNI">DNI</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label"># Documento</label>
                <input type="text" class="form-control" name="documento" id="documento" value="{{$cliente->documento}}">
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