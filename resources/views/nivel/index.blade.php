@extends("layout.plantilla")

@section("titulo","Nivel")

@section("cabecera","Administración de Nivel")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Niveles</h2>

                       <a href="{{route('nivel.create')}}" class="btn btn-primary">
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
                                 <th>Abreviatura</th>
                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($nivel)<=0)
                                <tr>
                                    <td colspan="4"><h4>No hay registros</h4></td>
                                </tr>
                                @else
                                @foreach ($nivel as $item)
                                    <tr>
                                    <td>{{$item->idNivel}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->abreviatura}}</td>
                                    <td>
                                        <a href="{{route('nivel.edit', $item->idNivel)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="{{route('nivel.confirmar',$item->idNivel)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$nivel->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->
@endsection
