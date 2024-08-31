@extends("layout.plantilla")

@section("titulo","Matrículas Anuladas")

@section("cabecera","Administración de Matrículas Anuladas")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Matrículas Anuladas
                        PERIODO:
                        @foreach ($periodo as $item)

                        @if ($item->actividad == 'ACTIVO')

                        {{$item->descripcion}}

                        @endif
                        @endforeach
                       </h2>

                        <form class="form-inline my-2" style="display: flex; justify-content: right" method="GET" role="search">
                            <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar por fecha" aria-label="Search" value="{{$buscarpor}}">
                            <button class="btn btn-outline-success my-2" type="submit">Search</button>
                        </form><br>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Código de Matrícula</th>
                                 <th>Fecha de Anulación</th>
                                 <th>Motivo</th>
                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($anulacion)<=0)
                                <tr>
                                    <td colspan="4"><h4>No hay matrículas anuladas en este periodo</h4></td>
                                </tr>
                                @else
                                @foreach ($anulacion as $item)
                                    <tr>
                                    <td>{{$item->idMatricula}}</td>
                                    <td>{{$item->fecha_a}}</td>
                                    <td>{{$item->motivo}}</td>
                                    <td>
                                      <a href="" data-target="#ver-matricula-{{$item->idMatricula}}" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Ver Detalles</a>
                                        @if(Auth::user()->idcargo ==4)
                                            <a href="{{route('anulacion.eliminar',$item->idAnulacion)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>Activar matrícula</a>
                                        @endif
                                      
                                    </td>
                                    </tr>
                                    @include('anulacion.ver')
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$anulacion->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->   
@endsection
