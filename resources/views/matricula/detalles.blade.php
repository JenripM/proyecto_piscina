@extends('layout.plantilla')

@section('contenido')
    <div class="container">
        <h1>Ver detalles de la Matrícula</h1>

        <form >
           
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>HORARIO</th>
                    <th>DOCENTE</th>
					<th>PISCINA</th>
					<th>MESES</th>
					<th>CANTIDAD PERSONAS</th>
                    <th>IMPORTE</th>
                    <th>DESCUENTO</th>
				  </tr>
				</thead>
				<tbody>

				   @foreach ($detalles as $item)
					<tr>
						<td>{{$item->detalle_vacante->programacion->turno->dia->descripcion}} {{$item->detalle_vacante->programacion->turno->descripcion}}</td>
                        <td>{{$item->detalle_vacante->programacion->personal->apellidos}} {{$item->detalle_vacante->programacion->personal->nombres}} </td>
                        <td>{{$item->detalle_vacante->programacion->piscina->descripcion}}: {{$item->detalle_vacante->programacion->nivel->descripcion}}</td>
                        <td>{{$item->detalle_vacante->vacante->mes}}</td>
						<td>{{$matricula->cantidad_personas}}</td>
                        <td>{{$item->monto->descripcion}}: xMES: {{$item->monto->montoMes}} // xCLASE: {{$item->monto->montoClase}}</td>
                        <td>{{$item->montoDescuento->descripcion}}: {{$item->montoDescuento->montoDescuento}}</td>
						</tr>
				   @endforeach

				 </tbody>
			  </table>
           
            <br><br>


            <a href="{{ route('matricula.index') }}" class="btn btn-default"><i class="fas fa-ban"></i>Cerrar</a>
        </form>
    </div>
@endsection
