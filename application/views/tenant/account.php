
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">INFORMASI AKUN</div>
</div>

<form action="<?=site_url('tenant/account')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$this->session->id?>"/>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> Nama</div>
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
			<input type="text" class="cb-input-text cb-col-full" id="name" name="name" value="<?=$model->account->name ?>" />
			<span class="text-danger"><?= form_error('name'); ?></span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> Alamat</div>
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
			<input type="text" class="cb-input-text cb-col-full" id="address" name="address" value="<?=$model->account->address ?>" />
			<span class="text-danger"><?= form_error('address'); ?></span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> Tanggal Lahir</div>
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
			<input type="text" class="cb-input-text cb-col-full datepicker" id="date_of_birth" name="date_of_birth" value="<?=$model->account->date_of_birth ?>" />
			<span class="text-danger"><?= form_error('date_of_birth'); ?></span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> No. HP</div>
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
			<input type="text" class="cb-input-text cb-col-full" id="phone_number" name="phone_number" value="<?=$model->account->phone_number ?>" />
			<span class="text-danger"><?= form_error('phone_number'); ?></span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> No. ID</div>
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
			<input type="text" class="cb-input-text cb-col-full" id="identification_no" name="identification_no" value="<?=$model->account->identification_no ?>" />
			<span class="text-danger"><?= form_error('identification_no'); ?></span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> E-mail</div>
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
			<input type="text" class="cb-input-text cb-col-full" id="email" name="email" value="<?=$model->account->email ?>" />
			<span class="text-danger"><?= form_error('email'); ?></span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> Password Lama</div>
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
			<input type="password" class="cb-input-text cb-col-full" id="old_password" name="old_password" value="<?= set_value('old_password'); ?>" />
			<span class="text-info">Kosongkan jika tidak ingin mengubah password</span>
		</div>
	</div>
	<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Password Baru </div>
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
				<input type="password" class="cb-input-text cb-col-full" name="password" value="<?= set_value('password'); ?>"/>
				<span class="text-info">Kosongkan jika tidak ingin mengubah password</span>
				<span class="text-danger"><?= form_error('password'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Ulangi Password</div>
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
				<input type="password" class="cb-input-text cb-col-full" name="passconf" value="<?= set_value('passconf'); ?>"/>
				<span class="text-info">Kosongkan jika tidak ingin mengubah password</span>
				<span class="text-danger"><?= form_error('passconf'); ?></span>
			</div>
		</div>
	<div class="cb-row cb-p-5">
		<button type="submit" class="cb-button-form cb-margin-auto">SIMPAN</button>
	</div>
</div>
</form>	

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Detil Akun</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->name ?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->address ?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_of_birth">Tanggal Lahir</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->date_of_birth ?>"readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="phone_number">No. HP</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->phone_number ?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="identification_no">No. ID</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->identification_no ?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="email">Email</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->email ?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="status">Status</label>
					<div class="col-xs-8"><input type="text" class="form-control" value="<?=$model->account->status ?>" readonly/></div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-10" <?php if ($model->account->status == "ACTIVE"){?> style="display:none"<?php } ?>>
						<button type="button" class="btn btn-default" onclick="popup.open('popup_unblock')">Aktivasi</button>
					</div>
					<div class="col-xs-1 col-xs-offset-10" <?php if ($model->account->status == "INACTIVE"){?> style="display:none"<?php } ?>>
						<button type="button" class="btn btn-default" onclick="popup.open('popup_block')">Blokir</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
*/ ?>