@extends('layout.plantilla')

@section('titulo','Nuevos Niveles')

@section("cabecera","Administración de Niveles")

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevos Niveles</h1>
        <form method="POST" action="{{route('nivel.store')}}">
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
            <div class="form-group">
                <label>Abreviatura</label>
                <input class="form-control @error('abreviatura') is-invalid @enderror" type="text"
                        placeholder="Ingrese abreviatura" id="abreviatura" name="abreviatura">
                    @error('abreviatura')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <button class="btn btn-primary">
                <i class="fa fa-save"></i>Grabar
            </button>

            <a href="{{route('cancelar.nivel')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection