<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->vouchers = new class{};
	
	$model->vouchers->voucher_id = "VC17120501"
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Voucher Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('voucher/create_voucher')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-sm-2" for="brand">Nama Brand:</label>
					<div class="col-sm-10">
						<select class="form-control" name="brand_id">
							<option value="1">Brand 1</option>
							<option value="2">Brand 2</option>
							<option value="3">Brand 3</option>
							<option value="4">Brand 4</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Deskripsi:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="voucher_description">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_description'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Nilai Voucher:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="voucher_worth" >
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_worth'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Jumlah Stok:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="voucher_stock">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_stock'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2">Kode Voucher:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="voucher_code">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_code'); ?></span>
				</div>
				<div class="form-group">
					<div class="col-sm-7">
						<button type="submit" class="btn btn-default">Kirim</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>