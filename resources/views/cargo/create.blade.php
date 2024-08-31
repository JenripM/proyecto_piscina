@extends('layout.plantilla')

@section('titulo','Nuevos Cargo')

@section("cabecera","Administración de Cargo")

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevos Cargos</h1>
        <form method="POST" action="{{route('cargo.store')}}">
            @csrf
            <div class="form-group">
                <label>Descripción</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"
                        placeholder="Ingrese descripcion" id="descripcion" name="descripcion">
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i>Grabar
            </button>

            <a href="{{route('cancelar.cargo')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection