<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Sign Up</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('account/signup')?>" class="form-horizontal" method="post">
				
			<h4>Data Diri</h4>
				<div class="form-group">
					<label class="control-label col-xs-3">Nama<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="text" name="name" class="form-control" value="<?= set_value('name'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Alamat<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="text" name="address" class="form-control" value="<?= set_value('address'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('address'); ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Tanggal Lahir<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="<?= set_value('date_of_birth'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('date_of_birth'); ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">No HP<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="text" name="phone_number" class="form-control" value="<?= set_value('phone_number'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('phone_number'); ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">No. ID</label>
					<div class="col-xs-9"><input type="text" name="identification_no" class="form-control" value="<?= set_value('identification_no'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('identification_no'); ?></div>
				</div>
				<!--<div class="form-group">
					<label class="control-label col-xs-3">Foto Kartu ID</label>
					<div class="col-xs-9"><input type="file" name="identification_pic" class="form-control" value="<?= set_value('identification_pic'); ?>"></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('identification_pic'); ?></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Foto Profil</label>
					<div class="col-xs-9"><input type="file" name="profile_pic" class="form-control" value="<?= set_value('profile_pic'); ?>"></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('profile_pic'); ?></div>
				</div>-->
			
			<h4>Account</h4>
				<div class="form-group">
					<label class="control-label col-xs-3">Email<span class="text-danger">*</span></label>
					<div class="col-xs-9"><input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>"/></div>
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('email'); ?></div>
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
					<div class="col-xs-offset-3">
						<button type="submit" class="btn btn-default">Sign Up</button>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</div>