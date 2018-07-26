<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTARKAN TENANT BARU</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<form action="<?=site_url('account/create_tenant')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="cb-row cb-col-full cb-txt-primary-1 cb-font-title cb-border-bottom">
			<div class="cb-align-center cb-font-size-xl">DATA TENANT</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nama Tenant</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="tenant_name" value="<?= set_value('tenant_name'); ?>"/>
				<span class="text-danger"><?= form_error('tenant_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nomor Unit</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="unit_number" value="<?= set_value('unit_number'); ?>"/>
				<span class="text-danger"><?= form_error('unit_number'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Lantai</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="floor" value="<?= set_value('floor'); ?>"/>
				<span class="text-danger"><?= form_error('floor'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nomor Rekening</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_account" value="<?= set_value('bank_account'); ?>"/>
				<span class="text-danger"><?= form_error('bank_account'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nama Bank </div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_name" value="<?= set_value('bank_name'); ?>"/>
				<span class="text-danger"><?= form_error('bank_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Cabang Bank</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_branch" value="<?= set_value('bank_branch'); ?>"/>
				<span class="text-danger"><?= form_error('bank_branch'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label">Atas Nama</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_account_owner" value="<?= set_value('bank_account_owner'); ?>"/>
				<span class="text-danger"><?= form_error('bank_account_owner'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Kategori Penjualan</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="selling_category" value="<?= set_value('selling_category'); ?>"/>
				<span class="text-danger"><?= form_error('selling_category'); ?></span>
			</div>
		</div>
		
		<!-- Data Diri -->
		<div class="cb-row cb-col-full cb-txt-primary-1 cb-font-title cb-border-bottom cb-border-top">
			<div class="cb-align-center cb-font-size-xl">DATA DIRI</div>
		</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="name" value="<?= set_value('name'); ?>"/>
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
				<input type="text" class="cb-input-text cb-col-full" name="address" value="<?= set_value('address'); ?>"/>
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
				<input type="text" class="cb-input-text cb-col-full date_of_birth_adult" name="date_of_birth" value="<?= set_value('date_of_birth'); ?>"/>
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
				<input type="text" class="cb-input-text cb-col-full" name="phone_number" value="<?= set_value('phone_number'); ?>"/>
				<span class="text-danger"><?= form_error('phone_number'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> No. KTP</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="identification_no" value="<?= set_value('identification_no'); ?>"/>
				<span class="text-danger"><?= form_error('identification_no'); ?></span>
			</div>
		</div
		
		<!-- Account -->
		<div class="cb-row cb-col-full cb-txt-primary-1 cb-font-title cb-border-bottom cb-border-top">
			<div class="cb-align-center cb-font-size-xl">INFORMASI AKUN</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="email" value="<?= set_value('email'); ?>"/>
				<span class="text-danger"><?= form_error('email'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Password</div>
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
				<span class="text-danger"><?= form_error('passconf'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-p-5">
			<div class="cb-col-fifth-4">
				<?= $error ?? "" ?>
			</div>
			<div class="cb-row cb-col-fifth">
				<button type="submit" class="cb-button-form cb-pull-right">BUAT AKUN</button>
			</div>
		</div>
	</form>
</div>

<?php /*
<div class="">
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
*/ ?>