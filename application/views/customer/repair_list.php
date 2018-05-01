<form action="<?=site_url('order/order_list')?>" method="post">
	<div class="cb-row cb-p-5">
		<div class="cb-col-full cb-row cb-border-round cb-bg-primary-2 cb-pl-5 cb-pr-5 cb-pb-5 cb-pt-2 cb-align-center">
			<div class="cb-font-title cb-txt-primary-3 cb-font-size-xl">MASUKKAN OTP</div>
			<div class="cb-col-full cb-row cb-border-round cb-bg-primary-3 cb-p-5">
				<div class="cb-col-full cb-row cb-mb-5">
					<input type="text" class="cb-input-text cb-col-full cb-align-center" name="otp"/>
				</div>
				<div class="cb-col-full cb-row cb-align-center">
					<button class="cb-button cb-button-form cb-col-fifth" type="submit">KIRIM</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Barang untuk Dikirim</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Masukkan OTP:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="otp"/>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default" type="submit" class="btn btn-default">Kirim</button>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>
*/ ?>