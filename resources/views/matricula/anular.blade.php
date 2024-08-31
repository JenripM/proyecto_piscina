@extends('layout.plantilla')

@section("titulo","Anular Matrícula")

@section('contenido')
    <div class="container">
        <h1 style="color: red">Desea Anular Registro?</h1>
        
        @php
        date_default_timezone_set("America/Lima");
        $date = date('Y-m-d');
         @endphp
        

        <h3>Código: {{$matricula->idMatricula}}</h3><br>
        <h3>Cliente: {{$matricula->cliente->nombres}} -- DNI: {{$matricula->cliente->documento}}</h3><br>
        <h3>Fecha de Matrícula: {{$matricula->fecha_matricula}}</h3><br>

        <br>
        <form method="POST" action="{{route('anulacion',$matricula->idMatricula)}}">
            {{-- @method('put') --}}
            @csrf
            <input class="form-control" type="date" id="fecha_a" value="{{$date}}" name="fecha_a" style="visibility: collapse">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fecha de la anulación</label>
                    <input class="form-control" type="date2" id="fecha_a2" value="{{$date}}" name="fecha_a" disabled>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Motivo de la anulación</label>
                    <textarea cols="30" rows="3" class="form-control " type="text"
                            placeholder="Ingrese motivo" id="motivo" name="motivo"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ</button>
            <a href="{{route('cancelar.matricula')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
          </form>
    </div>
@endsection
