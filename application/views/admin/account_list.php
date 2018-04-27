
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

<?php /*
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Customer</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="customer_id">ID</label></th>
							<th> <label for="customer_name">Nama</label></th>
							<th> <label for="email">E-mail</label></th>
							<th> <label for="date_joined">Tanggal Daftar</label></th>
							<th> </th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->customers as $customer)
						{
							?>
							<tr>
								<td>
									<?=$customer->customer_id?> </td>
								<td>
									<?=$customer->account_name?> </td>
								<td>
									<?=$customer->email?> </td>
								<td>
									<?=$customer->date_joined?> </td>
								<td>
									<a href="<?=site_url('account/account_detail/'.$customer->account_id)?>">
										<button class="btn btn-default">Lihat Akun</button>
									</a>
								</td>
								<td>
									<a href="<?=site_url('customer/profile/'.$customer->id)?>">
										<button class="btn btn-default">Lihat Profil</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Tenant</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><label for="tenant_id">ID</label></th>
							<th><label for="tenant_name">Tenant</label></th>
							<th><label for="account_name">PIC</label></th>
							<th><label for="email">E-mail</label></th>
							<th><label for="date_joined">Tanggal Daftar</label></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->tenants as $tenant)
						{
							?>
							<tr>
								<td>
									<?=$tenant->tenant_id?> </td>
								<td>
									<?=$tenant->tenant_name?> </td>
								<td>
									<?=$tenant->account_name?> </td>
								<td>
									<?=$tenant->email?> </td>
								<td>
									<?=$tenant->date_joined?> </td>
								<td>
									<a href="<?=site_url('account/account_detail/'.$tenant->account_id)?>">
										<button class="btn btn-default">Lihat</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			
			<a class="btn btn-default" href="<?=site_url('account/create_tenant')?>">
				Buat Akun
			</a>	
		</div>
	</div>
</div>

<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Deliverer</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="deliverer_id">ID</label></th>
							<th> <label for="deliverer_name">Nama</label></th>
							<th> <label for="email">E-mail</label></th>
							<th> <label for="date_joined">Tanggal Daftar</label></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->deliverers as $deliverer)
						{
							?>
							<tr>
								<td>
									<?=$deliverer->deliverer_id?> </td>
								<td>
									<?=$deliverer->account_name?> </td>
								<td>
									<?=$deliverer->email?> </td>
								<td>
									<?=$deliverer->date_joined?> </td>
								<td>
									<a href="<?=site_url('account/account_detail/'.$deliverer->account_id)?>">
										<button class="btn btn-default">Lihat</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<a class="btn btn-default" href="<?=site_url('account/create_deliverer')?>">
				Buat Akun
			</a>	
		</div>
	</div>
</div>
*/ ?>
