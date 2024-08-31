@extends("layout.plantilla")

@section("titulo","Piscina")

@section("cabecera","Administración de Piscinas")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Piscinas</h2>

                       <a href="{{route('piscina.create')}}" class="btn btn-primary">
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
                                 <th>Descripción</th>
                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($piscina)<=0)
                                <tr>
                                    <td colspan="3"><h4>No hay registros</h4></td>
                                </tr>
                                @else
                                @foreach ($piscina as $item)
                                    <tr>
                                    <td>{{$item->idPiscina}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>
                                        <a href="{{route('piscina.edit', $item->idPiscina)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="{{route('piscina.confirmar',$item->idPiscina)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$piscina->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->
@endsection
