<?php

?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Voucher Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('voucher/create_voucher')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-sm-3" for="brand">Berlaku untuk:</label>
					<div class="col-sm-9">
						<button type="button" class="btn btn-default" onclick="popup.open('popup_select_brand')">Lihat Brand</button>
					</div>
				</div>
					
				<div id="popup_select_brand" class="popup popup-md">
					<div class="panel panel-default">
						<div class="panel-heading">
							Pilih Brand
						</div>
						<div class="panel-body">
							<div class="form-group">
								<div class="col-sm-12" id="brand">
								<?php
								foreach($model->brand_list as $brand){
								?>
									<input type="checkbox" name="brand_list[]" value="<?=$brand->id?>"> <?=$brand->brand_name?><br>
								<?php 
								}
								?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-7">
									<button type="button" class="btn btn-default" onclick="popup.close('popup_select_brand')">OK</button>
								</div>
							</div>
						</div>
					</div>
				</div>				
				
				<div class="form-group">
					<label class="control-label col-sm-3">Deskripsi:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="voucher_description">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_description'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Nilai Voucher:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="voucher_worth" >
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_worth'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Jumlah Stok:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="voucher_stock">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_stock'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Kode Voucher:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="voucher_code">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('voucher_code'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-4"><input type="text" class="form-control datetimepicker" name="date_expired"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Minimal Pembelanjaan:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="min_order_price">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('min_order_price'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Pemakaian per Hari:</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="use_per_day">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('use_per_day'); ?></span>
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