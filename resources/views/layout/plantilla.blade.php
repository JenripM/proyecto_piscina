<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield("titulo")</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    {{-- <link href="/css/sb-admin-2.min.css" rel="stylesheet"> --}}
    {{-- <link href="/css/style.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('/css/style3.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>

<body id="page-top" class="nocturno">

    <!-- Page Wrapper -->
    <div id="wrapper">

            <!-- Sidebar -->
            <ul class="nocturno navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Piscinas Admin</div>
                    {{-- <div class="sidebar-brand-text mx-3">Piscinas Admin <sup>2</sup></div> --}}
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                
                @if(Auth::user()->estado=="Verificado")

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>
                @if(Auth::user()->idcargo != 4 && Auth::user()->idcargo != 3)
                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Administración</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div  class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Components:</h6>
                                <a class="collapse-item" href="{{route('cliente.index')}}">Clientes</a>

                                @if(Auth::user()->idcargo != 6)
                                    <a class="collapse-item" href="{{route('cargo.index')}}">Cargos</a>
                                    <a class="collapse-item" href="{{route('personal.index')}}">Personal</a>
                                @endif

                            </div>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->idcargo != 4 && Auth::user()->idcargo != 6)
                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                            aria-expanded="true" aria-controls="collapseUtilities3">
                            <i class="fas fa-bell fa-concierge"></i>
                            <span>Horarios</span>
                        </a>
                        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities3"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="{{route('dia.index')}}">Días</a>
                                <a class="collapse-item" href="{{route('turno.index')}}">Turnos</a>
                            </div>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->idcargo != 4)
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-calendar"></i>
                            <span>Programacion</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="{{route('programacion.index')}}">Programacion</a>
                                <a class="collapse-item" href="{{route('piscina.index')}}">Piscinas</a>
                                <a class="collapse-item" href="{{route('nivel.index')}}">Nivel</a>
                                <a class="collapse-item" href="{{route('vacante.index')}}">Vacantes</a>
                            </div>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->idcargo != 4 && Auth::user()->idcargo != 3 && Auth::user()->idcargo != 6) 
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                            aria-expanded="true" aria-controls="collapseUtilities2">
                            <!--  <i class="fas fa-fw fa-money"></i>     No se ustedes pero a mi no me sale este icono así que le puse otro       -->
                            <i class="fas fa-fw fa-dollar-sign"></i>
                            <span>Tarifas</span>
                        </a>
                        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities2"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="{{route('monto.index')}}">Montos</a>
                                <a class="collapse-item" href="{{route('descuento.index')}}">Descuentos</a>
                            </div>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->idcargo != 3)
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4"
                            aria-expanded="true" aria-controls="collapseUtilities4">
                            <!--  <i class="fas fa-fw fa-pincel"></i>     No se ustedes pero a mi no me sale este icono así que le puse otro       -->
                            <i class="fas fa-fw fa-pen"></i>
                            <span>Matrículas</span>
                        </a>
                        <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities4"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="{{route('matricula.index')}}">Realizar Matriculas</a>
                                {{-- <a class="collapse-item" href="{{route('voucher.index')}}">Voucher's</a> --}}
                                <a class="collapse-item" href="{{route('anulacion.index')}}">Anulaciones</a>
                            </div>
                        </div>
                    </li>
                @endif

                @if(Auth::user()->idcargo != 4 && Auth::user()->idcargo != 3 && Auth::user()->idcargo != 6)
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities6"
                            aria-expanded="true" aria-controls="collapseUtilities6">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Utilitarios</span>
                        </a>
                        <div id="collapseUtilities6" class="collapse" aria-labelledby="headingUtilities6"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="{{route('periodo.index')}}">Periodo</a>
                            </div>
                        </div>
                    </li>
                @endif



                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
                @endif
            </ul>
            
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content" class="nocturno">

                    <!-- Topbar -->
                    <nav id="navbar" class="nocturno navbar navbar-expand navbar-light topbar static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>


                        <button id="switch" class="switch">
                            <span><i class="fas fa-sun"></i> </span>
                            <span><i class="fas fa-moon"></i></span>
                        </button>

                        <div class="nav-item dropdown" style="margin-left: auto">
                            {{-- <button   class=" btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                               
                            </button> --}}
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    @if (Auth::user()->foto!="")
                                        <img class="img-profile rounded-circle" src="/img/usuarios/{{ Auth::user()->foto }}">  
                                    @else
                                        <img class="img-profile rounded-circle" src="/img/usuarios/default.jpg">                    
                                    @endif
                                </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a style="margin: auto" href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  Dashboard</a><br>
                                <a style="margin: auto" href="{{ route('usuario.perfil',Auth::user()->id) }}"> <i class="fa fa-user"></i>  Perfil de Usuario</a>
                                <form  method="POST" action="{{ route('logout') }}">
                                    @csrf
                                   <a style="margin: auto" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                        this.closest('form').submit();"> <i class="fa fa-lock"></i> Cerrar Sesion </a>
                                  </form>

                            </ul>
                          </div>




                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->

                    <div class="container-fluid" style="padding-top: 25px" >
                        <section class="content">
                            @yield("contenido")
                        </section>
                        <!-- Page Heading -->
                        {{-- <h1 class="h3 mb-4 text-gray-800">Dashboard</h1> --}}

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


                <!-- Footer -->
                <footer id="footer" class="nocturno sticky-footer ">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/js/funciones.js')}}"></script>
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>

    <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack("scripts")
</body>

</html>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
