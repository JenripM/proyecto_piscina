@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Editar Monto</h1>

        <form method="POST" action="{{route('monto.update',$montos->idMonto)}}">
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
              <input type="text" class="form-control" id="idNivel" name="idNivel" value="{{$montos->idMonto}}" disabled>
            </div>
           
            <div class="form-group">
                <label>Descripción</label>
                <input class="form-control @error('descripcion') is-invalid @enderror" type="text"  value="{{$montos->descripcion}}"
                        placeholder="Ingrese descripcion" id="descripcion" name="descripcion">
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label>Monto Por Mes</label>
                <input class="form-control @error('montoMes') is-invalid @enderror" type="text" value="{{$montos->montoMes}}"
                        placeholder="Ingrese monto por mes" id="montoMes" name="montoMes">
                    @error('montoMes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            <div class="form-group">
                <label>Monto Por Clase</label>
                <input class="form-control @error('montoClase') is-invalid @enderror" type="text" value="{{$montos->montoClase}}"
                        placeholder="Ingrese monto por clase" id="montoClase" name="montoClase">
                    @error('montoClase')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label>Fecha Inicio</label>
                <input class="form-control @error('fechaInicio') is-invalid @enderror" type="date" value="{{$montos->fechaInicio}}"
                        placeholder="Ingrese fecha inicial" id="fechaInicio" name="fechaInicio">
                    @error('fechaInicio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label>Fecha Final</label>
                <input class="form-control @error('fechaFinal') is-invalid @enderror" type="date" value="{{$montos->fechaFinal}}"
                        placeholder="Ingrese fecha final" id="fechaFinal" name="fechaFinal">
                    @error('fechaFinal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>

            <div class="form-group">
                <label>Tipo</label>
                <input class="form-control @error('tipo') is-invalid @enderror" type="text" value="{{$montos->tipo}}"
                        placeholder="Ingrese tipo" id="tipo" name="tipo">
                    @error('tipoe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
            </div><br><br>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{route('cancelar.monto')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection
