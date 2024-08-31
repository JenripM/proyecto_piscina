<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-2" id="ver-voucher-{{$item->idVoucher}}">

<form>
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Foto del Voucher Registrado</h4>
			</div>
			<div class="modal-body">
                <img src="{{asset('img/vouchers/'.$item->imagen)}}" alt="" style="height: 60%; width: 98%">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>

</form>
