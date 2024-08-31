@extends('layout.plantilla')

@section('titulo', 'Nuevos Turnos')

@section('cabecera', 'Administración de Turnos')

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevos Turnos</h1>

        <form method="POST" action="{{ route('turno.store') }}">
            @csrf

            <div class="col-md-6">
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

            <div  class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-right:10px">Día(s)</label>
                        <select class="form-control" name="iddia" id="iddia" required>
                            <option selected disabled>Seleccione una opcion</option>
                            @foreach ($dia as $item)
                                <option value="{{ $item->iddia }}"> {{ $item->descripcion }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label style="margin-right:10px">Descripcion de Turno</label>
                        <input class="form-control  @error('descripcion') is-invalid @enderror" value="{{ old('descripcion') }}"
                            type="text" placeholder="Ingrese descripcion" id="descripcion" name="descripcion"
                            style="margin-right:45px" required>
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 30px">
                <button class="btn btn-primary">
                    <i class="fa fa-save"></i>Grabar
                </button>
    
                <a href="{{ route('cancelar.turno') }}" class="btn btn-danger">
                    <i class="fas fa-ban"></i>Cancelar</a>
            </div>
        
        </form>

    </div>
@endsection
