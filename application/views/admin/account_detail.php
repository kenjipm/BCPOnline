
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DETIL AKUN</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-mb-5">
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
			<input type="text" class="cb-input-text cb-col-full" value="<?=$model->account->name ?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
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
			<input type="text" class="cb-input-text cb-col-full" value="<?=$model->account->address ?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
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
			<input type="text" class="cb-input-text cb-col-full" name="date_of_birth" value="<?=$model->account->date_of_birth ?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
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
			<input type="text" class="cb-input-text cb-col-full" name="phone_number" value="<?=$model->account->phone_number ?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
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
			<input type="text" class="cb-input-text cb-col-full" name="identification_no" value="<?=$model->account->identification_no ?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
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
			<input type="text" class="cb-input-text cb-col-full" name="email" value="<?=$model->account->email ?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> Status</div>
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
			<input type="text" class="cb-input-text cb-col-full" name="status" value="<?=$model->account->status ?>" readonly/>
		</div>
		<div class="cb-row cb-col-fifth cb-pl-5" <?php if ($model->account->status == "ACTIVE"){?> style="display:none"<?php } ?>>
			<button type="button" class="cb-button-form" onclick="popup.open('popup_unblock')">AKTIVASI</button>
		</div>
		<div class="cb-row cb-col-fifth cb-pl-5" <?php if ($model->account->status == "INACTIVE"){?> style="display:none"<?php } ?>>
			<button type="button" class="cb-button-form" onclick="popup.open('popup_block')">BLOKIR</button>
		</div>
	</div>
</div>
	

<div id="popup_unblock" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Aktivasi Akun
		</div>
		<div class="panel-body">
			<form action="<?=site_url('admin/unblock_account/' . $model->account->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Aktivasi akun ini?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="submit" class="btn btn-default" onclick="popup.close('popup_unblock')">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_unblock')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_block" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Blokir Akun
		</div>
		<div class="panel-body">
			<form action="<?=site_url('admin/block_account/' . $model->account->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Apakah Anda yakin untuk memblokir akun ini?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="submit" class="btn btn-default" onclick="popup.close('popup_block')">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_block')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

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