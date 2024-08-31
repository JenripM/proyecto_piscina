@extends("layout.plantilla")

@section("titulo","Vacante")

@section("cabecera","Administración de Vacantes")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Vacantes                    PERIODO: 
                        @foreach ($periodo as $item)
                            
                        @if ($item->actividad == 'ACTIVO')
        
                       {{$item->descripcion}}
                        
                        @endif
                        @endforeach
                  </h2>
                        
                       <a href="{{route('vacante.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Nuevo Registro
                      </a>

                        <form class="form-inline my-2" style="display: flex; justify-content: right" method="GET" role="search">
                            <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar mes" aria-label="Search" value="{{$buscarpor}}">
                            <button class="btn btn-outline-success my-2" type="submit">Search</button>
                        </form><br>

                        <div class="table-responsive">

                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Id Vacante</th>
                                 <th>Mes</th>
                                 <th>Cupos</th>
                                 {{-- <th>Acciones</th> --}}
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($vacante)<=0)
                                <tr>
                                    <td colspan="4"><h4>No hay registros en este periodo</h4></td>
                                </tr>
                                @else
                                @foreach ($vacante as $item)
                                    <tr>
                                    <td>{{$item->idVacante}}</td>
                                    <td>{{$item->mes}}</td>
                                    <td>{{$item->cupos}}</td>        
                                    {{-- <td>
                                        <a href="{{route('vacante.edit', $item->idVacante)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$vacante->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->
@endsection
