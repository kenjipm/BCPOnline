<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">TAMBAH VOUCHER</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<form action="<?=site_url('voucher/create_voucher')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Berlaku untuk</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<button type="button" class="btn btn-default" onclick="popup.open('popup_select_brand')">Lihat Brand</button>
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
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Deskripsi Voucher</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="voucher_description"/>
				<span class="text-danger"><?= form_error('voucher_description'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nilai Voucher</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="voucher_worth"/>
				<span class="text-danger"><?= form_error('voucher_worth'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Stok</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="voucher_stock"/>
				<span class="text-danger"><?= form_error('voucher_stock'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Kode Voucher</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="voucher_code"/>
				<span class="text-danger"><?= form_error('voucher_code'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label">Minimal Pembelanjaan</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="min_order_price"/>
				<span class="text-danger"><?= form_error('min_order_price'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label">Berlaku Hingga</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full datetimepicker" name="date_expired"/>
				<span class="text-danger"><?= form_error('date_expired'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label">Pemakaian per Hari</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="use_per_day"/>
				<span class="text-danger"><?= form_error('use_per_day'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth-4">
			</div>
			<div class="cb-row cb-col-fifth">
				<button type="submit" class="btn btn-default">Kirim</button>
			</div>
		</div>
	</form>
</div>

<?php /*
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

*/ ?>