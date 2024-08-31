@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Desea Eliminar Registro?</h1>
        <h3>Código: {{$nivel->idNivel}}</h3><br>
        <h3>Descripción: {{$nivel->descripcion}}</h3>
        <h3>Abreviatura: {{$nivel->abreviatura}}</h3>
        <br>
        <form method="POST" action="{{route('nivel.destroy',$nivel->idNivel)}}">
            @method('delete')
            {{-- {{ method_field('DELETE') }} --}}
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ</button>
            <a href="{{route('cancelar.nivel')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
          </form>
    </div>
@endsection
