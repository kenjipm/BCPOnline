<?php
	// Model untuk customer
	
	// // dummy voucher list
	// $model->vouchers = array();
	
	// // Model dummy voucher
	// $model->vouchers[0] = new class{};
	// $model->vouchers[0]->id = 1;
	// $model->vouchers[0]->voucher_id = "17120377701";
	// $model->vouchers[0]->voucher_stock = "10";
	// $model->vouchers[0]->voucher_brand = "Djisamsung";
	// $model->vouchers[0]->voucher_description = "Deskripsi voucher Djisamsung";
	// $model->vouchers[0]->date_added = "03-12-2017";
	// $model->vouchers[0]->voucher_worth = "Djisamsung";
	// $model->vouchers[0]->voucher_code = "Deskripsi voucher Djisamsung";
	// $model->vouchers[1] = new class{};
	// $model->vouchers[1]->id = 2;
	// $model->vouchers[1]->voucher_id = "17120577701";
	// $model->vouchers[1]->voucher_stock = "39";
	// $model->vouchers[1]->voucher_brand = "Appa";
	// $model->vouchers[1]->voucher_description = "Deskripsi voucher Appa";
	// $model->vouchers[1]->date_added = "05-12-2017";
	// $model->vouchers[2] = new class{};
	// $model->vouchers[2]->id = 3;
	// $model->vouchers[2]->voucher_id = "17120977701";
	// $model->vouchers[2]->voucher_stock = "40";
	// $model->vouchers[2]->voucher_brand = "Tos Ibak";
	// $model->vouchers[2]->voucher_description = "Deskripsi voucher Tos Ibak";
	// $model->vouchers[2]->date_added = "09-12-2017";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Voucher</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="voucher_stock">Stok</label></th>
							<th> <label for="voucher_brand">Nama Brand</label></th>
							<th> <label for="voucher_description">Deskripsi</label></th>
							<th> </th>
							<!--<th> </th>
							<th> </th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->vouchers as $voucher)
						{
							?>
							<tr>
								<td>
									<?=$voucher->voucher_stock?></td>
								<td>
									<?=$voucher->brand_name?> </td>
								<td>
									<?=$voucher->voucher_description?> </td>
								<td>
									<button class="btn btn-default" onclick="popup.open('popup_voucher_detail')">Lihat</button>
									</td>
								<!-- <td>
									<a href="<?=site_url('voucher/update_voucher/'.$voucher->id)?>">
										<button class="btn btn-default">Ubah</button>
									</a>
								</td>
								<td>
									<a href="<?=site_url('voucher/delete_voucher/'.$voucher->id)?>">
										<button class="btn btn-default">Hapus</button>
									</a>
								</td> -->
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
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
						<input type="text" value="<?=$model->vouchers[0]->voucher_stock?>" class="form-control" name="voucher_stock" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Nama Brand:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->brand_name?>" class="form-control" name="voucher_brand" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Kode Voucher:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->voucher_code?>" class="form-control" name="voucher_code" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Minimal Order:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->min_order_price?>" class="form-control" name="min_order_price" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Pemakaian per Hari:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->vouchers[0]->use_per_day?>" class="form-control" name="use_per_day" readonly>
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