@extends('layout.plantilla')

@section('titulo','Nuevos Descuentos')

@section("cabecera","Administración de Descuentos")

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevos  Montos de Descuentos</h1>
        <form method="POST" action="{{route('descuento.store')}}" class="row">
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

            <div class="row">
                <div class="col-md-6">
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
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Monto de Descuento</label>
                        <input class="form-control @error('montoDescuento') is-invalid @enderror" type="text"
                                placeholder="Ingrese monto por mes" id="montoDescuento" name="montoDescuento">
                            @error('montoDescuento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <button class="btn btn-primary">
                    <i class="fa fa-save"></i>Grabar
                </button>
    
                <a href="{{route('cancelar.monto')}}" class="btn btn-danger">
                    <i class="fas fa-ban"></i>Cancelar</a>
            </div>
        </form>
    </div>
@endsection