@extends('layout.plantilla')

@section('titulo','Nueva Matricula')

@section("cabecera","Administración de Matriculas")

@section('contenido')
    <div class="container">
        <h1>Registrar Nueva Matricula</h1>
        <form method="POST" action="{{route('matricula.store')}}" class="row">
            @csrf

            @php
                date_default_timezone_set("America/Lima");
                $date = date('Y-m-d');
            @endphp
            <input class="form-control" type="date" id="fechaMatricula" value="{{$date}}" name="fechaMatricula" style="visibility: collapse">

            <div class="col-md-6">
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

            <div class="col-md-6">
                <label style="margin-right:10px">Fecha de Matricula</label>
                <input class="form-control" type="date" id="fechaMatricula2" value="{{$date}}" name="fechaMatricula2" disabled>
            </div>

            <div  class="col-md-6">
                <label style="margin-right:10px">Cliente</label>
                <select class="form-control selectpicker" data-live-search="true" name="idCliente" id="idCliente" required>
                    <option selected disabled>Seleccione una opcion</option>
                    @foreach ($clientes as $item)
                        @if ($item->tipo_documento == 'RUC')
                            <option value="{{ $item->idCliente}}"> {{ $item->nombres }} // RUC: {{ $item->documento }} </option>
                        @else
                            <option value="{{ $item->idCliente}}"> {{ $item->nombres }} // DNI: {{ $item->documento }} </option>
                        @endif
                            
                    @endforeach
                </select>

                
                {{-- <a href="" data-target="#reg-cliente-modal" data-toggle="modal" class="btn btn-primary btn-sm" style="margin-top: 10px"><i class="fa fa-plus"></i>Registra Cliente</a> --}}
                
            </div>

            <div class="col-md-3">
                <label style="margin-right:10px">Cantidad de personas</label>
                <input class="form-control" type="number" id="CantidadPersonas" name="CantidadPersonas" >
            </div>
            

            <div class="row" style="margin-top: 30px; margin-bottom: 30px" id="panel-detalle">
                <div class="card" style="background-color: black">
                    <div class="card-header" style="background-color: black">
                        DETALLE DE LA MATRÍCULA
                    </div>
                    <div class="card-body" style="background-color: black">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Programaciones // Meses</label>
                                    <select name="pidProgramacion" id="pidProgramacion" class="form-control selectpicker" data-live-search="true">
                                      <option selected disabled>Seleccione una opcion</option>
                                      @foreach ($dv as $item)
                                        @if ($item->cupos_d == "0")
                                            <option value="0" style="color: red">
                                                {{$item->programacion->personal->apellidos}} {{$item->programacion->personal->nombres}}  //  
                                                {{$item->programacion->turno->dia->descripcion}}: {{$item->programacion->turno->descripcion}}  //
                                                {{$item->programacion->piscina->descripcion}}: {{$item->programacion->nivel->descripcion}}  //
                                                {{$item->vacante->mes}} -> Cupos: {{$item->cupos_d}} disponibles (TOTALES: {{$item->vacante->cupos}})
                                            </option>
                                        @else
                                            <option value="{{$item->iddv}}">
                                                {{$item->programacion->personal->apellidos}} {{$item->programacion->personal->nombres}}  //  
                                                {{$item->programacion->turno->dia->descripcion}}: {{$item->programacion->turno->descripcion}}  //
                                                {{$item->programacion->piscina->descripcion}}: {{$item->programacion->nivel->descripcion}}  //
                                                {{$item->vacante->mes}} -> Cupos: {{$item->cupos_d}} disponibles (TOTALES: {{$item->vacante->cupos}})
                                            </option>
                                        @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Montos</label>
                                    <select name="pidMonto" id="pidMonto" class="form-control selectpicker" data-live-search="true">
                                      <option selected disabled>Seleccione una opcion</option>
                                      @foreach ($montos as $item)
                                              <option value="{{ $item->idMonto}}">
                                                  {{$item->descripcion}} - {{ $item->montoMes }}
                                              </option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Descuentos</label>
                                    <select name="pidDescuento" id="pidDescuento" class="form-control selectpicker" data-live-search="true">
                                      <option selected disabled>Seleccione una opcion</option>
                                        @foreach($descuentos as $item)
                                            <option value="{{ $item->idMontoD}}" id="pidDescuento">
                                                {{$item->descripcion}} - {{ $item->montoDescuento }}
                                            </option>
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
                                                <th>Programacion</th>
                                                <th>Monto</th>
                                                <th>Descuento</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div  class="col-md-6" style="margin-top: 30px; margin-bottom: 30px" id="guardar">
                <button class="btn btn-primary" >
                    <i class="fa fa-save"></i>Grabar
                </button>
                <a href="{{route('cancelar.matricula')}}" class="btn btn-danger">
                    <i class="fas fa-ban"></i>Cancelar</a>
            </div>
            @include('matricula.rcliente')
        </form>
    </div>





    @push("scripts")
                <script>
            $(document).ready(function(){
                $('#bt_add').click(function(){
                    agregar();
                });
                $('#CantidadPersonas').change(function(){
                    mostrarDetalle();
                });
            });

            var cont=0;
            total=0;
            $("#guardar").hide();
            $("#panel-detalle").hide();

            function agregar(){
                idProgramacion=$("#pidProgramacion").val();
                programacion=$("#pidProgramacion option:selected").text();
                idMonto=$("#pidMonto").val();
                monto=$("#pidMonto option:selected").text();
                idDescuento=$("#pidDescuento").val();
                descuento=$("#pidDescuento option:selected").text();

                cantidadPersonas=$("#CantidadPersonas").val();
                pcupos_d=$("#pcupos_d").val();

                if(idProgramacion=="0"){
                    alert('CUPOS VACÍOS');
                }else{
                    if(idProgramacion!="" && idMonto!="" && idDescuento!=""){
                        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idProgramacion[]" value="'+idProgramacion+'">'+programacion+'</td><td><input type="hidden" name="idMonto[]" value="'+idMonto+'">'+monto+'</td><td><input type="hidden" name="idDescuento[]" value="'+idDescuento+'">'+descuento+'</td></tr>';
                        cont++;
                        total++;
                        evaluar();
                        $('#detalles').append(fila);
                    }
                    
                }
                
            }
            
            function mostrarDetalle(){
                if(parseInt(document.getElementById("CantidadPersonas").value)>=1)
                    $("#panel-detalle").show();
                else
                    $("#panel-detalle").hide();
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
