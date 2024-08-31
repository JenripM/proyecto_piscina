@extends("layout.plantilla")

@section("titulo","Periodos")

@section("cabecera","Administración de Periodos")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Periodos</h2>

                       <a href="{{route('periodo.create')}}" class="btn btn-primary">
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
                                 <th>Código</th>
                                 <th>Descripción</th>
                                 <th>Estado</th>
                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($periodo )<=0)
                                <tr>
                                    <td colspan="3"><h4>No hay registros</h4></td>
                                </tr>
                                @else
                                @foreach ($periodo as $item)
                                    <tr>
                                    <td>{{$item->idPeriodo}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    @if($item->actividad == "ACTIVO")
                                        <td style="font-family:Arial, Helvetica, sans-serif ;font-size: 20px ;color: rgb(7, 247, 7)">
                                          {{$item->actividad}}
                                        </td>
                                    @else
                                      <td>{{$item->actividad}}</td>
                                    @endif
                                    <td>
                                        <a href="{{route('periodo.activar', $item->idPeriodo)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Activar</a>
                                        {{-- <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a> --}}
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$periodo->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->   
@endsection
