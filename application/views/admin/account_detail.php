
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DETIL AKUN</div>
</div>
<form action="<?=site_url('account/account_detail/' . $model->account->id)?>" class="form-horizontal" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $model->account->id ?>">
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
			<input type="text" class="cb-input-text cb-col-full" name="name" value="<?=$model->account->name ?>" readonly/>
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
			<input type="text" class="cb-input-text cb-col-full" name="address" value="<?=$model->account->address ?>" readonly/>
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
			<?php if ($model->account->type == "TENANT") 
			{
			?>
			<input type="text" class="cb-input-text cb-col-full" name="phone_number" value="<?=$model->account->phone_number ?>"/>
			<span class="text-danger"><?= form_error('phone_number'); ?></span>
			<?php
			} else
			{
			?>
			<input type="text" class="cb-input-text cb-col-full" name="phone_number" value="<?=$model->account->phone_number ?>" readonly/>
			<?php
			}
			?>
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
	<?php if ($model->account->type == "TENANT") 
	{
	?>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> No. Rekening</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_account" value="<?=$model->account->bank_account ?>"/>
				<span class="text-danger"><?= form_error('bank_account'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Atas Nama</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_account_owner" value="<?=$model->account->bank_account_owner ?>"/>
				<span class="text-danger"><?= form_error('bank_account_owner'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nama Bank</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_name" value="<?=$model->account->bank_name ?>"/>
				<span class="text-danger"><?= form_error('bank_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
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
				<input type="text" class="cb-input-text cb-col-full" name="bank_branch" value="<?=$model->account->bank_branch ?>"/>
				<span class="text-danger"><?= form_error('bank_branch'); ?></span>
			</div>
		</div>
	<?php
	}
	?>
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
			<button type="button" class="cb-button-form" onclick="unblock_account()">AKTIVASI</button>
		</div>
		<div class="cb-row cb-col-fifth cb-pl-5" <?php if ($model->account->status == "INACTIVE"){?> style="display:none"<?php } ?>>
			<button type="button" class="cb-button-form" onclick="block_account()">BLOKIR</button>
		</div>
		<?php
			$this->load->view('admin/popup/approval');
		?>
	</div>
	<?php if ($model->account->type == "TENANT") 
	{
	?>
	<div class="cb-row cb-p-5">
		<button type="submit" class="cb-button-form cb-margin-auto">UBAH AKUN</button>
	</div>
	<?php
	}
	?>
</div>
</form>
	

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
