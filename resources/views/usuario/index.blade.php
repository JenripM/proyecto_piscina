@extends("layout.plantillaUser")

@section("titulo","Perfil de Usuario")

@section("cabecera","Administración de Peril de Usuario")

@section("contenido")
    <form method="POST" action="{{route('usuario.update',$user->id)}}"  enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row">

            <div  class="col-md-4">
                <label for="">Fotografía</label><br>
                    <input class="form-control" type="file" name="foto" id="foto">
                    <img src="{{asset('img/usuarios/'.$user->foto)}}" alt="Imagen No disponible" style="height: 70%; width: 100%" class="img-thumbnail" id="img">
            </div>
    
            <div class="col-md-8">
                <div class="row">
    
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input  class="form-control" type="text" name="" id="" value="{{$user->email}}" disabled>
                    </div>
    
                    <div class="col-md-6">
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" disabled>
                    </div>
    
                    <div class="col-md-12">
                        <label for="">Dirección</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="{{$user->direccion}}" disabled>
                    </div>
    
                    <div class="col-md-6">
                        <label for="">DNI</label>
                        <input class="form-control" type="text" name="dni" id="dni" value="{{$user->dni}}" disabled>
                        <br>

                        <div class="form-group">
                            <label for="">Cargo</label>
                            @if ($user->estado=="No Verificado")
                                <select name="idcargo" id="idcargo" class="form-control selectpicker" data-live-search="true">
                            @else
                                {{-- <select name="idcargo" id="idcargo" class="form-control selectpicker" data-live-search="true" disabled> --}}
                                <select name="idcargo" id="idcargo" class="form-control selectpicker" data-live-search="true">
                            @endif
                                <option selected disabled>Seleccione una opcion</option>
                                    @foreach ($cargos as $item)
                                        @if ($item->idcargo == 1 || $item->idcargo == 3 || $item->idcargo == 4 || $item->idcargo == 6)
                                            @if ($item->idcargo == $user->idcargo)
                                                <option value="{{ $item->idcargo }}" selected> {{ $item->descripcion }} </option>
                                            @else
                                                <option value="{{ $item->idcargo }}"> {{ $item->descripcion }} </option>
                                            @endif
                                            
                                        @endif
                                    @endforeach
                            </select>
                        </div>

                        @if ($user->estado=="No Verificado")
                            <label style="color: red; font-size: 30px; font-weight: bold;-webkit-text-stroke: 1px black;" for="">ESTADO: {{$user->estado}} (Complete Datos)</label>
                        @else
                            <label style="color: rgb(51, 255, 0); font-size: 30px; font-weight: bold;-webkit-text-stroke: 1px black;" for="">ESTADO: {{$user->estado}}</label>
                        @endif
                    </div>
    
                    <div class="col-md-6">
                        <button type="button" style="margin-top: 30px" id="editarInfo"  class="btn btn-primary"><i class="fas fa-book"></i> Editar Información</button>
                        <button type="submit" style="margin-top: 30px" id="guardarEdit"  class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                        <a href="{{ route('usuario.perfil',$user->id) }}" style="margin-top: 30px" id="cancelarEdit"  class="btn btn-danger "><i class="fa fa-ban"></i>Cancelar</a>
                        {{-- <button type="reset"  href="{{ route('usuario.perfil',$user->id) }}" style="margin-top: 30px" id="cancelarEdit"  class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button> --}}
                    </div>
    
    
                </div>
            </div>

    </div>
</form>

    @push("scripts")
            <script>
                $(document).ready(function(){
                    $('#editarInfo').click(function(){
                        empezarEdit();
                    });
                    // $('#cancelarEdit').click(function(){
                    //     cancelarEdit();
                    // });
                })


                $("#guardarEdit").hide();
                $("#cancelarEdit").hide();
                $("#foto").hide();

                function empezarEdit(){
                    $("#editarInfo").hide();
                    $("#guardarEdit").show();
                    $("#cancelarEdit").show();
                    $("#foto").show();
                    document.getElementById("direccion").disabled = false;
                    document.getElementById("dni").disabled = false;
                    document.getElementById("name").disabled = false;
                    document.getElementById("foto").value = "";

                    
                }

                // function cancelarEdit(){
                //     $("#editarInfo").show();
                //     $("#guardarEdit").hide();
                //     $("#cancelarEdit").hide();
                //     $("#foto").hide();
                //     document.getElementById("direccion").disabled = true;
                //     document.getElementById("dni").disabled = true;

                //     document.getElementById("img").src = "{{asset('img/usuarios/'.$user->foto)}}";
                //     document.getElementById("direccion").value = "";
                //     document.getElementById("dni").value = "";
                // }



                const $nombre_imagen = document.querySelector("#foto"),
                    $img = document.querySelector("#img");

                    // Escuchar cuando cambie
                    $nombre_imagen.addEventListener("change", () => {
                    // Los archivos seleccionados, pueden ser muchos o uno
                    const archivos = $nombre_imagen.files;
                    // Si no hay archivos salimos de la función y quitamos la imagen
                    if (!archivos || !archivos.length) {
                        $img.src = "";
                        return;
                    }
                    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                    const primerArchivo = archivos[0];
                    // Lo convertimos a un objeto de tipo objectURL
                    const objectURL = URL.createObjectURL(primerArchivo);
                    // Y a la fuente de la imagen le ponemos el objectURL
                    $img.src = objectURL;
                    });



            </script>
        @endpush
@endsection
