@extends("layout.plantilla")

@section("titulo","Descuentos")

@section("cabecera","Administración de Montos")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista de Montos  de Descuento                  PERIODO: 
                        @foreach ($periodo as $item)
                            
                        @if ($item->actividad == 'ACTIVO')
        
                       {{$item->descripcion}}
                        
                        @endif
                        @endforeach
                  </h2>
                        
                       <a href="{{route('descuento.create')}}" class="btn btn-primary">
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
                                 <th>Nº Código</th>
                                 <th>Descripción</th>
                                 <th>M. Descuento</th>
                        
                                 {{-- <th>Acciones</th> --}}
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($descuento)<=0)
                                <tr>
                                    <td colspan="8"><h4>No hay registros en este Periodo Activo</h4></td>
                                </tr>
                                @else
                                @foreach ($descuento as $item)
                                    <tr>
                                    <td>{{$item->idMontoD}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->montoDescuento}}</td>
                                        
                                    
                                    {{-- <td>
                                        <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$descuento->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->
@endsection
