<?php
	// Model untuk Tenant
	
	// dummy tenant id
	$model->tenants = new class{};
	
	$model->tenants->tenant_id = "17120488801"
?>

<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Tenant Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('account/create_tenant')?>" class="form-horizontal" method="post">
				<h4>Data Tenant</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama Tenant</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="tenant_name" value="<?= set_value('tenant_name'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('tenant_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_number">Nomor Unit</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="unit_number" value="<?= set_value('unit_number'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('unit_number'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="floor">Lantai</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="floor" value="<?= set_value('floor'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('floor'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="bank_account">No. Rekening</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="bank_account" value="<?= set_value('bank_account'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('bank_account'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="selling_category">Kategori</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="selling_category" value="<?= set_value('selling_category'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('selling_category'); ?></span>
				</div>
				
				<h4>Data Diri</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="name" value="<?= set_value('name'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="address" value="<?= set_value('address'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('address'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_of_birth">Tanggal Lahir</label>
					<div class="col-xs-9"><input type="text" class="form-control datepicker" name="date_of_birth" value="<?= set_value('date_of_birth'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('date_of_birth'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="phone_number">No. HP</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="phone_number" value="<?= set_value('phone_number'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('phone_number'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="identification_no">No. ID</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="identification_no" value="<?= set_value('identification_no'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('identification_no'); ?></span>
				</div>
				
				<h4>Account</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Email</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('email'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Password<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('password'); ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Ulangi Password<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="password" name="passconf" class="form-control" value="<?= set_value('passconf'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('passconf'); ?></div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= $error ?? "" ?></div>
					<div class="col-xs-offset-10">
						<button type="submit" class="btn btn-default">Buat Akun</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>