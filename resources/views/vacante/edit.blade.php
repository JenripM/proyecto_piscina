@extends('layout.plantilla')

@section('titulo','Vacante')

@section("cabecera","Administración de Vacantes")

@section('contenido')
    <div class="container">
        <h1>Registro Nuevo</h1>
        <form method="POST" action="{{route('vacante.update',$vacante->idVacante)}}">
            @method('put')
            @csrf

            <div class="form-group">
                <label>Periodo</label>

                @foreach ($periodo as $item)
                    
                @if ($item->actividad == 'ACTIVO')
                <input class="form-control" type="hidden" value="{{$item->idPeriodo}}"
                         id="idPeriodo" name="idPeriodo" >

                <input class="form-control" type="text" value="{{$item->descripcion}}" disabled>
                
                    @endif      
                @endforeach
   
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Código</label>
                <input type="text" class="form-control" id="idNivel" name="idNivel" value="{{$vacante->idVacante}}" disabled>
              </div>
           
              
            <div class="form-group">
                <label>Mes</label>
                <input class="form-control @error('mes') is-invalid @enderror" value="{{$vacante->mes}}" type="text"
                        placeholder="Ingrese Mes" id="mes" name="mes">
                    @error('mes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label>Cupos</label>
                <input class="form-control @error('cupos') is-invalid @enderror" value="{{$vacante->cupos}}" type="text"
                        placeholder="Ingrese Cupos" id="cupos" name="cupos">
                    @error('cupos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <button class="btn btn-primary">
                <i class="fa fa-save"></i>Grabar
            </button>

            <a href="{{route('cancelar.vacante')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection