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
