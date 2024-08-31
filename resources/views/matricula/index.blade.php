@extends("layout.plantilla")

@section("titulo","Matriculas")

@section("cabecera","Administración de Matriculas")

@section("contenido")
    {{-- <h1>Lista Días</h1> --}}
                   <!-- Start responsive Table-->
                   <div class="row">

                    <h2 class="header-title">Lista de Matriculas                   PERIODO:
                        @foreach ($periodo as $item)

                        @if ($item->actividad == 'ACTIVO')

                    {{$item->descripcion}}

                        @endif
                        @endforeach
                    </h2>

                    <div class="col-md-9">
    
                        <a href="{{route('matricula.create')}}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>Nuevo Registro
                        </a>
                       </div>

                       <div class="col-md-3">
                            <form class="form-inline my-2 " style="display: flex; justify-content: right" method="GET" role="search">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="form-check " id="radioB">
                                            @if($columna=="" || $columna=="fecha_matricula")
                                                <input class="form-check-input" type="radio" value="fecha_matricula" name="buscar" id="bFecha" checked>
                                            @else
                                                <input class="form-check-input" type="radio" value="fecha_matricula" name="buscar" id="bFecha">
                                            @endif

                                            <label class="form-check-label" for="bFecha">Buscar por Fecha</label>
                                          </div>
                                          <div class="form-check ">

                                            @if($columna=="" || $columna=="fecha_matricula")
                                                <input class="form-check-input" type="radio" value="cliente" name="buscar" id="bCliente">
                                            @else
                                                <input class="form-check-input" type="radio" value="cliente" name="buscar" id="bCliente" checked>
                                            @endif

                                            <label class="form-check-label" for="bCliente">Buscar por Cliente</label>
                                          </div>
                                    </div>
                                    <div class="col-md-12">
                                        @if($columna=="" || $columna=="fecha_matricula")
                                            <input id="buscador" name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar por Fecha" aria-label="Search" value="{{$buscarpor}}">
                                        @else
                                            <input id="buscador" name="buscarpor" class="form-control my-2" type="search" placeholder="Buscar por Cliente" aria-label="Search" value="{{$buscarpor}}">
                                        @endif
                                        <button class="btn btn-outline-success my-2" type="submit">Search</button>
                                    </div>
                                </div>
                            </form><br>
                       </div>

                   </div>

                   

                   

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table table-bordered">
                             <thead>
                               <tr>
                                 <th>Nº</th>
                                 <th>Cliente</th>
                                 <th>Voucher</th>
                                 <th>Fecha Matricula</th>
                                 <th>C. Persona</th>

                                 <th>Acciones</th>
                               </tr>
                             </thead>
                             <tbody>
                                @if(count($matriculas)<=0)
                                <tr>
                                    <td colspan="8"><h4>No hay registros en este Periodo Activo</h4></td>
                                </tr>
                                @else
                                @foreach ($matriculas as $item)
                                    <tr>
                                    <td>{{$item->idMatricula}}</td>

                                    @foreach ($clientes as $itemC)
                                    @if ($itemC->idCliente == $item->idCliente)
                                        <td>
                                            {{$itemC->nombres}}
                                        </td>

                                    @endif
                                    @endforeach

                                    @if($item->idVoucher == "0")
                                        <td style="color: red">
                                            VOUCHER PENDIENTE
                                        </td>
                                    @else
                                    <td>
                                        <a href="" data-target="#ver-voucher-{{$item->idMatricula}}" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>Ver</a>
                                        {{-- <a href="" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i>Edit</a> --}}
                                        @if ($item->voucher->observacion=="APROBADO")
                                            <label style="color: rgb(51, 255, 0); font-size: 150%; font-weight: bold;-webkit-text-stroke: 1px black;">APROBADO</label>
                                        @else
                                            <label>Obs: {{$item->voucher->observacion}}</label>
                                        @endif
                                        
                                    </td>
                                    @endif

                                    <td>{{$item->fecha_matricula}}</td>
                                    <td>{{$item->cantidad_personas}}</td>


                                    <td>
                                        @if($item->idVoucher == "0")
                                            <a href="{{route('voucher.create2',$item->idMatricula)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add Voucher</a>
                                        @else
                                            @if(Auth::user()->idcargo ==4)
                                                {{-- <a href="" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i>Edit</a> --}}
                                            @endif
                                        @endif
        
                                        <a href="{{route('matricula.show', $item->idMatricula)}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i>Detalles</a>
                                        <a href="{{route('matricula.anular',$item->idMatricula)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Anular</a>
                                    </td>
                                    </tr>

                                    @include('matricula.ver')
                                @endforeach
                                @endif
                              </tbody>
                           </table>
                           {{$matriculas->links()}}
                        </div>
                    </div>

                  <!-- End responsive Table-->


    @push("scripts")
        <script>
              $(document).ready(function(){
                $('#bFecha').change(function(){
                    buscapor();
                });
                $('#bCliente').change(function(){
                    buscapor();
                });
              });
  
              var cont=0;
              total=0;
              $("#guardar").hide();
              $("#panel-detalle").hide();

              function buscapor(){
                if($('#bFecha').is(':checked')){
                document.getElementById("buscador").placeholder="Buscar por Fecha"
                }else{
                document.getElementById("buscador").placeholder="Buscar por Cliente"
             }
            }
            
             
          </script>
      @endpush
@endsection
