@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Desea Eliminar Registro?</h1>
        <h3>Código: {{$dia->iddia}}</h3><br>
        <h3>Descripción: {{$dia->descripcion}}</h3>
        <br>
        <form method="POST" action="{{route('dia.destroy',$dia->iddia)}}">
            @method('delete')
            {{-- {{ method_field('DELETE') }} --}}
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ</button>
            <a href="{{route('cancelar.dia')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
          </form>
    </div>
@endsection