
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTAR CUSTOMER</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> ID </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> E-mail </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal Daftar </div>
		</div>
	</div>
	<?php
	foreach($model->customers as $customer)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$customer->customer_id?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$customer->account_name?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$customer->email?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$customer->date_joined?> </div>
			</div>
			<div class="cb-col-fifth">
				<a href="<?=site_url('account/account_detail/'.$customer->account_id)?>">
					<button class="cb-button-form cb-align-center">LIHAT</button>
				</a>
			</div>
		</div>
		<?php
	}
	?>
</div>

<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTAR TENANT</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama Tenant </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama PIC </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> E-mail </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal Daftar </div>
		</div>
	</div>
	<?php
	foreach($model->tenants as $tenant)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$tenant->tenant_name?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$tenant->account_name?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$tenant->email?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$tenant->date_joined?> </div>
			</div>
			<div class="cb-col-fifth">
				<a href="<?=site_url('account/account_detail/'.$tenant->account_id)?>">
					<button class="cb-button-form cb-align-center">LIHAT</button>
				</a>
			</div>
		</div>
		<?php
	}
	?>
	<div class="cb-row cb-col-full cb-p-5">
		<a class="cb-button-form cb-align-right" href="<?=site_url('account/create_tenant')?>">
			Buat Akun
		</a>	
	</div>
</div>

<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTAR DELIVERER</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> ID </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> E-mail </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal Daftar </div>
		</div>
	</div>
	<?php
	foreach($model->deliverers as $deliverer)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$deliverer->deliverer_id?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$deliverer->account_name?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$deliverer->email?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$deliverer->date_joined?> </div>
			</div>
			<div class="cb-col-fifth">
				<a href="<?=site_url('account/account_detail/'.$deliverer->account_id)?>">
					<button class="cb-button-form cb-align-center">LIHAT</button>
				</a>
			</div>
		</div>
		<?php
	}
	?>
	<div class="cb-row cb-col-full cb-p-5">
		<a class="cb-button-form cb-align-right" href="<?=site_url('account/create_deliverer')?>">
			Buat Akun
		</a>	
	</div>
</div>


<div id="popup_verify" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Verifikasi Akun
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Verifikasi akun ini?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_verify')">Batal</button>
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
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Apakah Anda yakin untuk memblokir akun ini?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_block')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
