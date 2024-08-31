@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Editar Programacion</h1>

        <form method="POST" action="{{ route('programacion.update', $programacion->idProgramacion) }}">
            @method('put')
            @csrf

            <div class="form-group">
                <label>Periodo</label>

                @foreach ($periodo as $item)
                    @if ($item->actividad == 'ACTIVO')
                        <input class="form-control" type="hidden" value="{{ $item->idPeriodo }}" id="idPeriodo"
                            name="idPeriodo">

                        <input class="form-control" type="text" value="{{ $item->descripcion }}" disabled>
                    @endif
                @endforeach
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Código</label>
                <input type="text" class="form-control" id="idNivel" name="idNivel"
                    value="{{ $programacion->idProgramacion }}" disabled>
            </div>

            <label style="margin-right:10px">Turno</label>
            <select class="form-control" name="idTurno" id="idTurno" required>
                <option selected disabled>Seleccione una opcion</option>
                @foreach ($turno as $item)
                    @foreach ($periodo as $itemp)
                        @if ($itemp->idPeriodo == $item->idPeriodo)
                            @if ($itemp->actividad == 'ACTIVO')
                                <option @if ($programacion->idTurno == $item->idTurno) selected="selected" @endif
                                    value="{{ $item->idTurno }}">
                                    @foreach ($dia as $itemD)
                                        @if ($itemD->iddia == $item->iddia)
                                            {{ $itemD->descripcion }}
                                        @endif
                                    @endforeach
                                    {{ $item->descripcion }}
                                </option>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </select>
            <label style="margin-right:10px">Nivel</label>
            <select class="form-control" name="idNivel" id="idNivel" required>
                <option selected disabled>Seleccione una opcion</option>
                @foreach ($nivel as $item)
                    <option @if ($programacion->idNivel == $item->idNivel) selected="selected" @endif value="{{ $item->idNivel }}">
                        {{ $item->descripcion }} </option>
                @endforeach
            </select>

            <label style="margin-right:10px">Piscinas</label>
            <select class="form-control" name="idPiscina" id="idPiscina" required>
                <option selected disabled>Seleccione una opcion</option>
                @foreach ($piscina as $item)
                    <option @if ($programacion->idPiscina == $item->idPiscina) selected="selected" @endif value="{{ $item->idPiscina }}">
                        {{ $item->descripcion }} </option>
                @endforeach
            </select>


            <label style="margin-right:10px">Docente</label>
            <select class="form-control" name="idPersonal" id="idPersonal" required>

                <option selected disabled>Seleccione una opcion</option>
                @foreach ($personal as $item)
                    @if ($item->idCargo == '3')
                        <option @if ($programacion->idPersonal == $item->idPersonal) selected="selected" @endif
                            value="{{ $item->idPersonal }}"> {{ $item->apellidos }}, {{ $item->nombres }} </option>
                    @endif
                @endforeach
            </select>

            {{-- <label style="margin-right:10px">Descripcion de Programacion</label>
            <input class="form-control  @error('descripcion') is-invalid @enderror"
                value="{{ $programacion->descripcion }}" type="text" placeholder="Ingrese descripcion" id="descripcion"
                name="descripcion" style="margin-right:45px" required>
            @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
            <br><br>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('cancelar.programacion') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
        </form>
    </div>
@endsection
