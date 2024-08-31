@extends("layout.plantilla")

@section("titulo","Turnos")

@section("cabecera","Administración de Turno")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista Turnos PERIODO:
                        @foreach ($periodo as $itemper)
                        
                        @if ($itemper->actividad == 'ACTIVO')
        
                          {{$itemper->descripcion}}
                          
                          @endif
                        @endforeach</h2>

                       <a href="{{route('turno.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Nuevo Registro
                      </a>

                        <form class="form-inline my-2" style="display: flex; justify-content: right" method="GET" role="search">
                            <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar descripcion" aria-label="Search" value="{{$buscarpor}}">
                            <button class="btn btn-outline-success my-2" type="submit">Search</button>
                        </form><br>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Nº</th>
                                 <th>Dia</th>
                                 <th>Descripcion</th>
                                 <th>Periodo</th>
                                 {{-- <th>Acciones</th> --}}
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($turno)<=0)
                                <tr>
                                    <td colspan="5"><h4>No hay registros en este periodo</h4></td>
                                </tr>
                                @else
                                @foreach ($turno as $item)
                                    <tr>
                                    <td>{{$item->idTurno}}</td>

                                    @foreach ($dia as $itemD)
                                    @if ($itemD->iddia == $item->iddia)
                                      <td>{{$itemD->descripcion}}</td>
                                    @endif
                                    @endforeach

                                    <td>{{$item->descripcion}}</td>

                                    @foreach ($periodo as $itemP)
                                    @if ($itemP->idPeriodo == $item->idPeriodo)
                                      <td>{{$itemP->descripcion}}</td>
                                    @endif
                                    @endforeach 

                                    {{-- <td>
                                        <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$turno->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->   
@endsection
