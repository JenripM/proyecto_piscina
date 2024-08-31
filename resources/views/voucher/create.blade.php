@extends('layout.plantilla')

@section('titulo', 'Nuevo Voucher')

@section('cabecera', 'Administración de Vouchers')

@section('contenido')
    <div class="container">
        <h1>Registrar Nuevo Voucher</h1>
        <form method="POST" action="{{ route('voucher.store') }}" class="row" style="margin-top:30px" enctype="multipart/form-data">
            @csrf

            <input class="form-control" type="text" id="idMatricula" name="idMatricula" value="{{$matricula->idMatricula}}" style="visibility: collapse">
            <div class="col-md-4">
                <div class="form-group">
                    <label>ID MATRÍCULA</label>
                    <input class="form-control" type="text" id="idMatricula2" name="idMatricula2" value="{{$matricula->idMatricula}}" disabled>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>CLIENTE</label>
                    <input class="form-control" type="text" id="idMatricula" name="idMatricula" value="{{$matricula->cliente->nombres}}" disabled>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>FECHA MATRÍCULA</label>
                    <input class="form-control" type="text" id="idMatricula" name="idMatricula" value="{{$matricula->fecha_matricula}}" disabled>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label>Banco</label>
                    <input class="form-control @error('banco') is-invalid @enderror" type="text"
                            placeholder="Ingrese banco" id="banco" name="banco">
                        @error('banco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nro Operacion</label>
                    <input class="form-control @error('nroOperacion') is-invalid @enderror" type="text"
                            placeholder="Ingrese numero operacion" id="nroOperacion" name="nroOperacion">
                        @error('nroOperacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ruta Imagen</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" >
                </div>
            </div>

            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">
                                ACCIONES
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <button id="grabarButton" class="btn btn-success" style="margin-top:30px; border-radius: 5px" type="submit">
                                    <i class="fa fa-save" style="margin-right:7px"></i>Aprobar
                                </button>
                                <button id="grabarButton2" class="btn btn-primary" style="margin-top:30px; border-radius: 5px" type="submit">
                                    <i class="fa fa-eye" style="margin-right:7px"></i>Enviar observación
                                </button>

                                <textarea style="margin-top:5px;" cols="30" rows="3" class="form-control " type="text"
                                            placeholder="Ingrese observacion" id="observacion" name="observacion"></textarea>
                            </td>
                            <td>
                                <a href="{{ route('cancelar.matricula') }}" class="btn btn-danger"  style="margin-top:30px;border-radius: 5px">
                                    <i class="fas fa-ban" style="margin-right:7px"></i>Retroceder</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
    
            <div class="col-md-4">
                <img src="" alt="imagen no disponible" height="300px" width="500px" class="img-thumbnail" id="img">
            </div>

        </form>
    </div>

    @push("scripts")
        <script>
            $(document).ready(function(){
                $('#observacion').keyup(function(){
                    cambiarBoton();
                });
            })

            $("#grabarButton2").hide();


            function cambiarBoton(){

                if($("#observacion").val().length == 0){
                    $("#grabarButton2").hide();
                    $("#grabarButton").show();
                }else{
                    $("#grabarButton2").show();
                    $("#grabarButton").hide();
                }
            }

             const $nombre_imagen = document.querySelector("#imagen"),
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
