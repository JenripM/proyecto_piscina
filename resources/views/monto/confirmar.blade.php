@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Desea Eliminar Registro?</h1>
        <h3>Código: {{$montos->idMonto}}</h3><br>
        <h3>Descripción: {{$montos->descripcion}}</h3>
        <h3>Monto: {{$montos->tipo}}</h3>
        <br>
        <form method="POST" action="{{route('monto.destroy',$montos->idMonto)}}">
            @method('delete')
            {{-- {{ method_field('DELETE') }} --}}
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ</button>
            <a href="{{route('cancelar.monto')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
          </form>
    </div>
@endsection
