@extends("layout.plantilla")

@section("titulo","Personal")

@section("cabecera","Administración de Personal")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Personal</h2>

                       <a href="{{route('personal.create')}}" class="btn btn-primary">
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
                                 <th>DNI</th>
                                 <th>Apellidos</th>
                                 <th>Nombres</th>
                                 <th>Direccion</th>
                                 <th>Telefono</th>
                                 <th>Sexo</th>
                                 <th>Cargo</th>
                                 <th>Acciones</th>
                                </tr>
                             </thead>
                             <tbody>
                                @if(count($personal)<=0)
                                <tr>
                                    <td colspan="10"><h4>No hay registros</h4></td>
                                </tr>
                                @else
                                @foreach ($personal as $item)
                                    <tr>
                                    <td>{{$item->idPersonal}}</td>
                                    <td>{{$item->dni}}</td>
                                    <td>{{$item->apellidos}}</td>
                                    <td>{{$item->nombres}}</td>
                                    <td>{{$item->direccion}}</td>
                                    <td>{{$item->telefono}}</td>
                                    <td>{{$item->sexo}}</td>
                                    @foreach ($cargos as $itemCargos)
                                      @if ($itemCargos->idcargo == $item->idCargo)
                                        <td>{{$itemCargos->descripcion}}</td>
                                      @endif
                                    @endforeach

                                    <td>
                                        <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$personal->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->
@endsection
