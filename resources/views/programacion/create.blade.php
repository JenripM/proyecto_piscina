@extends('layout.plantilla')

@section('titulo', 'Nuevas Programaciones')

@section('cabecera', 'Administración de Programacion')

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevas Programaciones</h1>

        <form method="POST" action="{{route('programacion.store')}}" class="row">
            @csrf

            <div class="col-md-3">
                <div class="form-group">
                    <label>Periodo</label>
                    @foreach ($periodo as $item)
                        
                    @if ($item->actividad == 'ACTIVO')
                    <input class="form-control" type="hidden" value="{{$item->idPeriodo}}"
                             id="idPeriodo" name="idPeriodo" >
    
                    <input class="form-control" type="text" value="{{$item->descripcion}}" disabled>
                    
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="col-md-9">
                <label style="margin-right:10px">Docente</label>
                <select class="form-control selectpicker" data-live-search="true" name="idPersonal" id="idPersonal" required>
                    <option selected disabled>Seleccione una opcion</option>
                    @foreach ($personal as $item)
                    @if ($item->idCargo == '3')
                        <option value="{{ $item->idPersonal}}"> {{ $item->apellidos}}, {{$item->nombres}} // DNI: {{$item->dni}}</option>
                    @endif
                @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label style="margin-right:10px">Turno</label>
                        <select class="form-control selectpicker" data-live-search="true" name="idTurno" id="idTurno" required>
                            <option selected disabled>Seleccione una opcion</option>
                            @foreach ($turno as $item)
                                @foreach($periodo as $itemp)
                                @if($itemp->idPeriodo ==$item->idPeriodo)
                                    @if ($itemp->actividad == 'ACTIVO')
                                    <option value="{{ $item->idTurno }}">
                                        @foreach ($dia as $itemD)
                                        @if ($itemD->iddia == $item->iddia)
                                        {{$itemD->descripcion}}
                                        @endif
                                        @endforeach
                                        {{ $item->descripcion }}
                                    </option>
                                    @endif

                                @endif


                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label style="margin-right:10px">Nivel</label>
                    <select class="form-control selectpicker" data-live-search="true" name="idNivel" id="idNivel" required>
                        <option selected disabled>Seleccione una opcion</option>
                        @foreach ($nivel as $item)
                            <option value="{{ $item->idNivel }}"> {{ $item->descripcion }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label style="margin-right:10px">Piscinas</label>
                    <select class="form-control selectpicker" data-live-search="true" name="idPiscina" id="idPiscina" required>
                        <option selected disabled>Seleccione una opcion</option>
                        @foreach ($piscina as $item)
                            <option value="{{ $item->idPiscina}}"> {{ $item->descripcion }} </option>
                        @endforeach
                    </select>
                </div>

                <div>

                </div>
            </div>



            <div class="row">
                <div class="card" style="background-color: black">
                    <div class="card-header" style="background-color: black">
                        DETALLE DE LA VACANTES
                    </div>
                    <div class="card-body" style="background-color: black">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Vacantes</label>
                                <select name="pidVacante" id="pidVacante" class="form-control selectpicker" data-live-search="true">
                                    <option selected disabled>Seleccione una opcion</option>
                                    @foreach($vacante as $item)
                                        <option value="{{$item["idVacante"]}}">{{$item["mes"]}} -- Cupos: {{$item["cupos"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="button" id="bt_add" class="btn btn-primary">Add</button>
                        </div>
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="detalles" class="table table-bordered"  width="100%" cellspacing="0">
                                        <thead>
                                            <th>Opciones</th>
                                            <th>Datos Vacante</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div>

                </div>
            </div>

            <div class="col-md-12" id="guardar">
                <div class="form-group">
                    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
                    <button style="margin-top: 30px" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
                <a href="{{route('cancelar.programacion')}}" style="margin-top: 30px" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
                </div>
            </div>
          </form>
    </div>

    @push("scripts")
                <script>
            $(document).ready(function(){
                $('#bt_add').click(function(){
                    agregar();
                })
            })

            var cont=0;
            total=0;
            $("#guardar").hide();

            function agregar(){
                idVacante=$("#pidVacante").val();
                vacante=$("#pidVacante option:selected").text();

                if(idVacante!=""){
                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idVacante[]" value="'+idVacante+'">'+vacante+'</td></tr';
                    cont++;
                    total++;
                    evaluar();
                    $('#detalles').append(fila);
                }
            }

            function evaluar(){
                if(total>0){
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }

            function eliminar(index){
                $('#fila'+index).remove();
                total--;
                evaluar();
            }
        </script>
    @endpush
@endsection
