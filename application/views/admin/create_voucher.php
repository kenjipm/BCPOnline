<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->vouchers = new class{};
	
	$model->vouchers->voucher_id = "VC17120501"
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Brand Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>ID Voucher:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" value="<?=$model->vouchers->voucher_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Deskripsi:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="voucher_description">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Nilai Voucher:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="voucher_worth" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Tanggal Dibuat:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="date_added">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Jumlah Stok:</label>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="voucher_stock">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Nama Brand:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="voucher_brand">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Kode Voucher:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="voucher_code" readonly>
					</div>
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