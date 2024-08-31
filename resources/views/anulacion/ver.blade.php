<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-2" id="ver-matricula-{{$item->idMatricula}}">

<form>
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Detalles del Voucher</h4>
			</div>
			<div class="modal-body">
                @if($item->idVoucher!="0")
                    <p>Código Matrícula: {{$item->matricula->idMatricula}}<p>
                    <p>Cliente: {{$item->matricula->cliente->nombres}}</p>
                        @if ($item->matricula->cliente->tipo_documento == 'RUC')
                            <p>RUC: {{$item->matricula->cliente->documento}}<p>
                        @else
                            <p>DNI: {{$item->matricula->cliente->documento}}<p>
                        @endif
                    <p>Fecha de Matrícula: {{$item->matricula->fecha_matricula}}<p>
                    <p>Periodo: {{$item->matricula->periodo->descripcion}}<p>
                    <p>Voucher:<p>
                        @if($item->matricula->voucher != '')
                            <img src="{{asset('img/vouchers/'.$item->matricula->voucher->imagen)}}" alt=" VOUCHER NO REGISTRADO" style="height: 60%; width: 98%">
                        @else
                            <img src="" alt=" VOUCHER NO REGISTRADO" style="height: 60%; width: 98%">
                        @endif
                @endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>

</form>
