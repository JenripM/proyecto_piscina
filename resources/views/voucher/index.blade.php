@extends("layout.plantilla")

@section("titulo","Vouchers")

@section("cabecera","Administración de Vouchers")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="col-md-12">
                    <div class="white-box">
                       <h2 class="header-title">Lista Voucher's</h2>

                       {{-- <a href="{{route('voucher.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>Nuevo Registro
                      </a> --}}

                        <form class="form-inline my-2" style="display: flex; justify-content: right" method="GET" role="search">
                            <input name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar por banco" aria-label="Search" value="{{$buscarpor}}">
                            <button class="btn btn-outline-success my-2" type="submit">Search</button>
                        </form><br>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Nº</th>
                                 <th>Banco</th>
                                 <th>N. Operacion</th>
                                 <th>Imagen</th>
                                 <th>Observacion</th>
                                 {{-- <th>Acciones</th> --}}
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($voucher)<=0)
                                <tr>
                                    <td colspan="5"><h4>No hay registros</h4></td>
                                </tr>
                                @else
                                @foreach ($voucher as $item)
                                    <tr>
                                    <td>{{$item->idVoucher}}</td>
                                    <td>{{$item->banco}}</td>
                                    <td>{{$item->nroOperacion}}</td>
                                    <td>
                                        <img src="{{asset('img/vouchers/'.$item->imagen)}}" alt="" height="100px" width="100px">
                                        <a href="" data-target="#ver-voucher-{{$item->idVoucher}}" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Ver</a>
                                    </td>
                                    <td>{{$item->observacion}}</td>
                                    {{-- <td>
                                        <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Editar</a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Eliminar</a>
                                    </td> --}}
                                    </tr>
                                    @include('voucher.ver')
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$voucher->links()}}
                        </div>
                    </div>
                    </div>
                  <!-- End responsive Table-->   
@endsection
