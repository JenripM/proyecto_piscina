@extends('layout.plantilla')

@section('titulo','Vacante')

@section("cabecera","Administración de Vacantes")

@section('contenido')
    <div class="container">
        <h1>Registro Nuevo</h1>
        <form method="POST" action="{{route('vacante.store')}}">
            @csrf

            <div class="row">
                <div class="col-md-12">
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
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mes</label>
                        {{-- <input class="form-control @error('mes') is-invalid @enderror" type="text"
                                placeholder="Ingrese Mes" id="mes" name="mes"> --}}
                        <select class="form-control" name="mes" id="mes">
                            <option value="Enero" selected>Enero</option>
                            <option value="Febrero">Febrero</option>
                            <option value="Marzo">Marzo</option>
                            <option value="Abril">Abril</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Junio">Junio</option>
                            <option value="Julio">Julio</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Setiembre">Setiembre</option>
                            <option value="Octubre">Octubre</option>
                            <option value="Noviembre">Noviembre</option>
                            <option value="Diciembre">Diciembre</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cupos</label>
                        <input class="form-control @error('cupos') is-invalid @enderror" type="text"
                                placeholder="Ingrese Cupos" id="cupos" name="cupos">
                            @error('cupos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
            </div>
            
        

            <button class="btn btn-primary">
                <i class="fa fa-save"></i>Grabar
            </button>

            <a href="{{route('cancelar.vacante')}}" class="btn btn-danger">
                <i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection