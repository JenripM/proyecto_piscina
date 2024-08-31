@extends("layout.plantilla")

@section("titulo","Inicio")

@section("cabecera","Página de Administración")

@section("contenido")
    <h1>Bienvenido 
        @if (Auth::user()->estado=="No Verificado")
            - Necesita Completar los datos de su perfil
        @endif
    </h1>
@endsection