@extends('layout.plantilla')

@section('titulo', 'Nuevos Periodos')

@section('cabecera', 'Administración de Periodos')

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevos Periodos</h1>
        <form method="POST" action="{{ route('periodo.store') }}">
            @csrf
            <div class="form-group">
                <label>Descripción</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                    placeholder="Ingrese descripcion" id="descripcion" name="descripcion">
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{--<label style="margin-right:10px">Estado</label>
                <select class="form-control" name="actividad" id="actividad" required>
                    <option selected disabled>Seleccione una opcion</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>--}}
            </div>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i>Grabar
            </button>

            <a href="{{ route('cancelar.periodo') }}" class="btn btn-danger">
                <i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection
