@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Desea Eliminar Registro?</h1>
        <h3>Código: {{$piscina->idPiscina}}</h3><br>
        <h3>Descripción: {{$piscina->descripcion}}</h3>
        <br>
        <form method="POST" action="{{route('piscina.destroy',$piscina->idPiscina)}}">
            @method('delete')
            {{-- {{ method_field('DELETE') }} --}}
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ</button>
            <a href="{{route('cancelar.piscina')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
          </form>
    </div>
@endsection
