<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-2" id="ver-voucher-{{$item->idMatricula}}">

<form>
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Detalles del Voucher</h4>
			</div>
			<div class="modal-body">
                @if($item->idVoucher!="0")
                    <p>Código Voucher: {{$item->voucher->idVoucher}}<p>
                    <p>Banco: {{$item->voucher->banco}}<p>
                    <p>Nro Operación: {{$item->voucher->nroOperacion}}<p>
                    <p>Observaciones: {{$item->voucher->observacion}}<p>
                    <img src="{{asset('img/vouchers/'.$item->voucher->imagen)}}" alt="" style="height: 60%; width: 98%">
                @endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>

</form>
