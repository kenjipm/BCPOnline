<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">UBAH PASSWORD ADMIN</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<?php if ($message) { ?>
	<div class="cb-row cb-p-5">
		<div class="cb-col-full">
			<div class="cb-txt-primary-1 cb-align-center cb-border-bottom">
				<div class="cb-label cb-font-size-xl"> <?=$message?></div>
			</div>
		</div>
	</div>
	<?php } ?>
	<form action="<?=site_url('account/setting_password')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
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
				<input type="password" class="cb-input-text cb-col-tenth-9" id="old_password" name="old_password" value="<?= set_value('old_password'); ?>"/>
				<button type="button" class="cb-icon cb-icon-eye cb-col-tenth cb-button cb-button-group-right" onclick="peek_password('old_password')"></button>
				<span class="text-danger"><?= form_error('old_password'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Password Baru</div>
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
				<input type="password" class="cb-input-text cb-col-tenth-9" id="new_password" name="new_password" value="<?= set_value('new_password'); ?>"/>
				<button type="button" class="cb-icon cb-icon-eye cb-col-tenth cb-button cb-button-group-right" onclick="peek_password('new_password')"></button>
				<span class="text-danger"><?= form_error('new_password'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Ulangi Password Baru</div>
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
				<input type="password" class="cb-input-text cb-col-tenth-9" id="passconf" name="passconf" value="<?= set_value('passconf'); ?>"/>
				<button type="button" class="cb-icon cb-icon-eye cb-col-tenth cb-button cb-button-group-right" onclick="peek_password('passconf')"></button>
				<span class="text-danger"><?= form_error('passconf'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-p-5">
			<div class="cb-col-fifth-4">
				<?= $error ?? "" ?>
			</div>
			<div class="cb-row cb-col-fifth">
				<button type="submit" class="cb-button-form cb-pull-right">UBAH PASSWORD</button>
			</div>
		</div>
	</form>
</div>

<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">UBAH PASSWORD SUPER ADMIN</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<?php if ($message) { ?>
	<div class="cb-row cb-p-5">
		<div class="cb-col-full">
			<div class="cb-txt-primary-1 cb-align-center cb-border-bottom">
				<div class="cb-label cb-font-size-xl"> <?=$message?></div>
			</div>
		</div>
	</div>
	<?php } ?>
	<form action="<?=site_url('account/setting')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
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
				<input type="password" class="cb-input-text cb-col-tenth-9" id="old_password" name="old_password" value="<?= set_value('old_password'); ?>"/>
				<button type="button" class="cb-icon cb-icon-eye cb-col-tenth cb-button cb-button-group-right" onclick="peek_password('old_password')"></button>
				<span class="text-danger"><?= form_error('old_password'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Password Baru</div>
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
				<input type="password" class="cb-input-text cb-col-tenth-9" id="new_password" name="new_password" value="<?= set_value('new_password'); ?>"/>
				<button type="button" class="cb-icon cb-icon-eye cb-col-tenth cb-button cb-button-group-right" onclick="peek_password('new_password')"></button>
				<span class="text-danger"><?= form_error('new_password'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Ulangi Password Baru</div>
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
				<input type="password" class="cb-input-text cb-col-tenth-9" id="passconf" name="passconf" value="<?= set_value('passconf'); ?>"/>
				<button type="button" class="cb-icon cb-icon-eye cb-col-tenth cb-button cb-button-group-right" onclick="peek_password('passconf')"></button>
				<span class="text-danger"><?= form_error('passconf'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-p-5">
			<div class="cb-col-fifth-4">
				<?= $error ?? "" ?>
			</div>
			<div class="cb-row cb-col-fifth">
				<button type="submit" class="cb-button-form cb-pull-right">UBAH PASSWORD</button>
			</div>
		</div>
	</form>
</div>
