@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Desea Eliminar Registro?</h1>
        <h3>Código: {{$cliente->idCliente}}</h3><br>
        <h3>Nombres: {{$cliente->nombres}}</h3>
        <h3>Documento: {{$cliente->tipo_documento}} -> {{$cliente->documento}}</h3>
        <br>
        <form method="POST" action="{{route('cliente.destroy',$cliente->idCliente)}}">
            @method('delete')
            {{-- {{ method_field('DELETE') }} --}}
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SÍ</button>
            <a href="{{route('cancelar.cliente')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i>NO</a>
          </form>
    </div>
@endsection
