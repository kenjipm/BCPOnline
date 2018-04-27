
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Deliverer Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('account/create_deliverer')?>" class="form-horizontal" method="post">
				<h4>Data Kendaraan</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="license_plate">Nomor Plat</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="license_plate" value="<?= set_value('license_plate'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('license_plate'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="vehicle_desc">Deskripsi Kendaraan</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="vehicle_desc" value="<?= set_value('vehicle_desc'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('vehicle_desc'); ?></span>
				</div>
				
				<h4>Data Pengirim</h4>
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
					<div class="col-xs-9"><input type="text" class="form-control datetimepicker" name="date_of_birth" value="<?= set_value('date_of_birth'); ?>"/></div>
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
					<label class="control-label col-xs-3" for="email">Email</label>
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