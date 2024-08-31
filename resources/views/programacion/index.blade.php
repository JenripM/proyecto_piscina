@extends("layout.plantilla")

@section("titulo","Programacion")

@section("cabecera","Administración de Programacion")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Programaciones PERIODO:
                        @foreach ($periodo as $itemper)
                        
                        @if ($itemper->actividad == 'ACTIVO')
        
                          {{$itemper->descripcion}}
                          
                          @endif
                        @endforeach
                       </h2>

                       <a href="{{route('programacion.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Nuevo Registro
                      </a>

                        <form class="form-inline my-2" style="display: flex; justify-content: right" method="GET" role="search">
                            <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar id" aria-label="Search" value="{{$buscarpor}}">
                            <button class="btn btn-outline-success my-2" type="submit">Search</button>
                        </form><br>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Nº</th>
                                 <th>Turno</th>
                                 <th>Piscina</th>
                                 <th>Nivel</th>
                                 <th>Docente</th>
                                 {{-- <th>Descripcion</th> --}}
                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($programacion)<=0)
                                <tr>
                                    <td colspan="7"><h4>No hay registros en este periodo</h4></td>
                                </tr>
                                @else
                                @foreach ($programacion as $item)
                                    <tr>
                                    <td>{{$item->idProgramacion}}</td>

                                    @foreach ($turno as $itemT)
                                    @if ($itemT->idTurno == $item->idTurno)
                                        <td>
                                            @foreach ($dia as $itemD)
                                            @if ($itemD->iddia == $itemT->iddia)
                                                {{$itemD->descripcion}}
                                            @endif
                                            @endforeach
                                            {{$itemT->descripcion}}
                                        </td>

                                    @endif
                                    @endforeach

                                    @foreach ($piscina as $itemPi)
                                    @if ($itemPi->idPiscina == $item->idPiscina)
                                      <td>{{$itemPi->descripcion}}</td>
                                    @endif
                                    @endforeach 

                                   

                                    @foreach ($nivel as $itemN)
                                    @if ($itemN->idNivel == $item->idNivel)
                                      <td>{{$itemN->descripcion}}</td>
                                    @endif
                                    @endforeach 

                                    @foreach ($personal as $itemPe)
                                    @if ($itemPe->idPersonal== $item->idPersonal)
                                        <td>
                                            {{$itemPe->apellidos}}, {{$itemPe->nombres}}
                                        </td>
                                    @endif
                                    @endforeach

                                    {{-- <td>{{$item->descripcion}}</td> --}}
                                    <td>
                                      <a href="{{route('programacion.show', $item->idProgramacion)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Ver</a>                                        {{-- <a href="{{route('programacion.edit', $item->idProgramacion)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a> --}}
                                        {{-- <a href="{{route('programacion.confirmar',$item->idProgramacion)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a> --}}
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$programacion->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->   
@endsection
