@extends("layout.plantilla")

@section("titulo","Cliente")

@section("cabecera","Administración de Cliebtes")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista Clientes</h2>

                       <a href="{{route('cliente.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Nuevo Registro
                      </a>

                        <form class="form-inline my-2" style="display: flex; justify-content: right" method="GET" role="search">
                            <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar nombres" aria-label="Search" value="{{$buscarpor}}">
                            <button class="btn btn-outline-success my-2" type="submit">Search</button>
                        </form><br>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Código</th>
                                 <th>Direccion</th>
                                 <th>Teléfono</th>
                                 <th>Nombres</th>
                                 <th>Sexo</th>
                                 <th>Tipo Documento</th>
                                 <th># Documento</th>
                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($cliente)<=0)
                                <tr>
                                    <td colspan="8"><h4>No hay registros</h4></td>
                                </tr>
                                @else
                                @foreach ($cliente as $item)
                                    <tr>
                                    <td>{{$item->idCliente}}</td>
                                    <td>{{$item->direccion}}</td>
                                    <td>{{$item->telefono}}</td>
                                    <td>{{$item->nombres}}</td>
                                    <td>{{$item->sexo}}</td>
                                    <td>{{$item->tipo_documento}}</td>
                                    <td>{{$item->documento}}</td>
                                    <td>
                                        <a href="{{route('cliente.edit', $item->idCliente)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="{{route('cliente.confirmar',$item->idCliente)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$cliente->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->
@endsection
