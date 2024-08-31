@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Ver detalle Vacantes - Programacion</h1>

        <form >
           
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Vacantes Totales</th>
					<th>Disponibles</th>
				  </tr>
				</thead>
				<tbody>

				   @foreach ($detalles as $item)
					<tr>
						<td>{{$item->mes}}   Cupos: {{$item->cupos}}</td>
						<td>{{$item->cupos_d}}</td>
						</tr>
				   @endforeach

				 </tbody>
			  </table>
           
            <br><br>


            <a href="{{ route('programacion.index') }}" class="btn btn-default"><i class="fas fa-ban"></i>Cerrar</a>
        </form>
    </div>
@endsection
