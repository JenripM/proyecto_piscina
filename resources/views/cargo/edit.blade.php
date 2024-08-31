@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Editar Cargos</h1>

        <form method="POST" action="{{route('cargo.update',$cargo->idcargo)}}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Código</label>
              <input type="text" class="form-control" id="idcargo" name="idcargo" value="{{$cargo->idcargo}}" disabled>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Descripción</label>
              <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"
              value="{{$cargo->descripcion}}">
              @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div><br><br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{route('cancelar.cargo')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection
