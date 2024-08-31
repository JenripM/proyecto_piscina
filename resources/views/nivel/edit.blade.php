@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Editar Piscinas</h1>

        <form method="POST" action="{{route('nivel.update',$nivel->idNivel)}}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Código</label>
              <input type="text" class="form-control" id="idNivel" name="idNivel" value="{{$nivel->idNivel}}" disabled>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Descripción</label>
              <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion"
              value="{{$nivel->descripcion}}">
              @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div><br><br>

            <div class="mb-3">
              <label for="" class="form-label">Abreviatura</label>
              <input type="text" class="form-control @error('abreviatura') is-invalid @enderror" id="abreviatura" name="abreviatura"
              value="{{$nivel->abreviatura}}">
              @error('abreviatura')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div><br><br>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{route('cancelar.nivel')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection
