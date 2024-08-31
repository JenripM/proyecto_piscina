@extends('layout.plantilla')

@section('titulo', 'Nuevo Personal')

@section('cabecera', 'Administración de Personal')

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevo Personal</h1>
        <form method="POST" action="{{ route('personal.store') }}"  style="margin-top:30px">
            @csrf
            <div class="form-group">
                <label>DNI</label>
                <div class="form-inline" style="margin-bottom:20px">
                    <input class="form-control   @error('dni') is-invalid @enderror" type="text"  value="{{old('dni')}}"  placeholder="Ingrese DNI"
                        id="dni" name="dni" required>
                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <label>Apellidos</label>
                <div style="margin-bottom:20px">
                    <input class="form-control  @error('apellidos') is-invalid @enderror" value="{{old('apellidos')}}" type="text"
                        placeholder="Ingrese apellidos" id="apellidos" name="apellidos" required>
                    @error('apellidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <label>Nombres</label>
                <div  style="margin-bottom:30px">
                    <input class="form-control  @error('nombres') is-invalid @enderror" value="{{old('nombres')}}"  type="text"
                        placeholder="Ingrese nombres" id="nombres" name="nombres" required>
                    @error('nombres')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-inline"  style="margin-bottom:20px">

                    <label style="margin-right:10px">Telefono</label>
                    <input class="form-control  @error('telefono') is-invalid @enderror" value="{{old('telefono')}}"  type="text"
                        placeholder="Ingrese telefono" id="telefono" name="telefono" style="margin-right:45px" required>
                    @error('telefono')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label style="margin-right:10px">Sexo</label>
                    <select  class="form-control" name="sexo"  id="sexo" style="margin-right:45px" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option  value="M">MASCULINO</option>
                        <option  value="F">FEMENINO</option>

                    </select>

                    <label style="margin-right:10px">Cargo</label>
                    <select  class="form-control" name="idCargo" id="idCargo" required>
                        <option selected disabled>Seleccione una opcion</option>

                        @foreach ($cargos as $item)
                          <option value="{{$item->idcargo}}"> {{$item->descripcion}} </option>
                        @endforeach

                    </select>
                </div>



                <label>Direccion</label>
                <div  style="margin-bottom:30px">
                    <input class="form-control  @error('direccion') is-invalid @enderror" value="{{old('direccion')}}" type="text"
                        placeholder="Ingrese direccion" id="direccion" name="direccion" required>
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <button class="btn btn-primary" style="margin-right:20px; border-radius: 5px">
                <i class="fa fa-save" style="margin-right:7px"></i>Grabar
            </button>

            <a href="{{ route('cancelar.personal') }}" class="btn btn-danger"  style="border-radius: 5px">
                <i class="fas fa-ban" style="margin-right:7px"></i>Cancelar</a>
        </form>
    </div>
@endsection
