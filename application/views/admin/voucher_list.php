<?php
	// Model untuk customer
	
	// dummy voucher list
	$model->vouchers = array();
	
	// Model dummy voucher
	$model->vouchers[0] = new class{};
	$model->vouchers[0]->id = 1;
	$model->vouchers[0]->voucher_id = "17120377701";
	$model->vouchers[0]->voucher_stock = "10";
	$model->vouchers[0]->voucher_brand = "Djisamsung";
	$model->vouchers[0]->voucher_description = "Deskripsi voucher Djisamsung";
	$model->vouchers[0]->date_added = "03-12-2017";
	$model->vouchers[0]->voucher_worth = "Djisamsung";
	$model->vouchers[0]->voucher_code = "Deskripsi voucher Djisamsung";
	$model->vouchers[1] = new class{};
	$model->vouchers[1]->id = 2;
	$model->vouchers[1]->voucher_id = "17120577701";
	$model->vouchers[1]->voucher_stock = "39";
	$model->vouchers[1]->voucher_brand = "Appa";
	$model->vouchers[1]->voucher_description = "Deskripsi voucher Appa";
	$model->vouchers[1]->date_added = "05-12-2017";
	$model->vouchers[2] = new class{};
	$model->vouchers[2]->id = 3;
	$model->vouchers[2]->voucher_id = "17120977701";
	$model->vouchers[2]->voucher_stock = "40";
	$model->vouchers[2]->voucher_brand = "Tos Ibak";
	$model->vouchers[2]->voucher_description = "Deskripsi voucher Tos Ibak";
	$model->vouchers[2]->date_added = "09-12-2017";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Voucher</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="voucher_id">ID</label>	</div>
				<div class="col-xs-1"> <label for="voucher_stock">Stok</label>	</div>
				<div class="col-xs-2"> <label for="voucher_brand">Nama Brand</label> </div>
				<div class="col-xs-7"> <label for="voucher_description">Deskripsi</label> </div>
			</div>
			<?php
			foreach($model->vouchers as $voucher)
			{
				?>
				<div class="row list-group">
					<a onclick="popup.open('popup_voucher_detail')">
						<div class="col-xs-2 list-group-item">
							<?=$voucher->voucher_id?> </div>
						<div class="col-xs-1 list-group-item">
							<?=$voucher->voucher_stock?> </div>
						<div class="col-xs-2 list-group-item">
							<?=$voucher->voucher_brand?> </div>
						<div class="col-xs-7 list-group-item">
							<?=$voucher->voucher_description?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('voucher/create_voucher')?>">
				Buat voucher
			</a>	
		</div>
	</div>
</div>


<div id="popup_voucher_detail" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Detil Voucher
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>ID Voucher:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Deskripsi:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_description?>" class="form-control" id="voucher_description" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Nilai Voucher:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_worth?>" class="form-control" id="voucher_worth" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Tanggal Dibuat:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->date_added?>" class="form-control" id="date_added" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Jumlah Stok:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_stock?>" class="form-control" id="voucher_stock" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Nama Brand:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_brand?>" class="form-control" id="voucher_brand" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Kode Voucher:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_code?>" class="form-control" id="voucher_code" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-5">
						<a href="<?=site_url('tenant_pay_receipt/set_price')?>">
							<button type="button" class="btn btn-default" onclick="popup.close('popup_voucher_detail')">Harga Bayar</button>
						</a>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_voucher_detail')">Tutup</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>