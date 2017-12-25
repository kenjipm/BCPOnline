<?php
	// Model untuk customer
	
	// // dummy account list
	// $model->tenants = array();
	// $model->customers = array();
	// $model->deliverers = array();
	
	// // Model dummy tenant
	// $model->tenants[0] = new class{};
	// $model->tenants[0]->id = 1;
	// $model->tenants[0]->tenant_id = "17120377701";
	// $model->tenants[0]->account_name = "Yessy";
	// $model->tenants[0]->tenant_name = "Henpon Senter";
	// $model->tenants[0]->email = "yessy@gmail.com";
	// $model->tenants[0]->date_joined = "03-12-2017";
	// $model->tenants[0]->status = "Verified";
	// $model->tenants[1] = new class{};
	// $model->tenants[1]->id = 2;
	// $model->tenants[1]->tenant_id = "17120577704";
	// $model->tenants[1]->account_name = "Yesi";
	// $model->tenants[1]->tenant_name = "Leptop Canggih";
	// $model->tenants[1]->email = "tesi@gmail.com";
	// $model->tenants[1]->date_joined = "05-12-2017";
	// $model->tenants[1]->status = "Unverified";
	// $model->tenants[2] = new class{};
	// $model->tenants[2]->id = 3;
	// $model->tenants[2]->tenant_id = "17120877794";
	// $model->tenants[2]->account_name = "Nosy";
	// $model->tenants[2]->tenant_name = "Kamera Terkenal";
	// $model->tenants[2]->email = "nosy@gmail.com";
	// $model->tenants[2]->date_joined = "08-12-2017";
	// $model->tenants[2]->status = "Verified";
	
	// // Model dummy customer
	// $model->customers[0] = new class{};
	// $model->customers[0]->id = 1;
	// $model->customers[0]->customer_id = "17120377701";
	// $model->customers[0]->customer_name = "Willy";
	// $model->customers[0]->email = "willy@gmail.com";
	// $model->customers[0]->date_joined = "03-12-2017";
	// $model->customers[1] = new class{};
	// $model->customers[1]->id = 2;
	// $model->customers[1]->customer_id = "17120577704";
	// $model->customers[1]->customer_name = "Christo";
	// $model->customers[1]->email = "bill@gmail.com";
	// $model->customers[1]->date_joined = "05-12-2017";
	// $model->customers[2] = new class{};
	// $model->customers[2]->id = 3;
	// $model->customers[2]->customer_id = "17120877794";
	// $model->customers[2]->customer_name = "Billy";
	// $model->customers[2]->email = "billy@gmail.com";
	// $model->customers[2]->date_joined = "08-12-2017";
	
	// Model dummy deliverer
	// $model->deliverers[0] = new class{};
	// $model->deliverers[0]->id = 1;
	// $model->deliverers[0]->deliverer_id = "17120388801";
	// $model->deliverers[0]->account_name = "Dori";
	// $model->deliverers[0]->email = "dori@gmail.com";
	// $model->deliverers[0]->date_joined = "03-12-2017";
	// $model->deliverers[0]->status = "Kosong";
	// $model->deliverers[1] = new class{};
	// $model->deliverers[1]->id = 2;
	// $model->deliverers[1]->deliverer_id = "17120588804";
	// $model->deliverers[1]->deliverer_name = "Rido";
	// $model->deliverers[1]->email = "rido@gmail.com";
	// $model->deliverers[1]->date_joined = "05-12-2017";
	// $model->deliverers[1]->status = "Sibuk";
	// $model->deliverers[2] = new class{};
	// $model->deliverers[2]->id = 3;
	// $model->deliverers[2]->deliverer_id = "17120888898";
	// $model->deliverers[2]->deliverer_name = "Rodi";
	// $model->deliverers[2]->email = "rodi@gmail.com";
	// $model->deliverers[2]->date_joined = "08-12-2017";
	// $model->deliverers[2]->status = "Kosong";
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Tenant</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="tenant_id">ID</label>	</div>
				<div class="col-xs-2"> <label for="tenant_name">Tenant</label> </div>
				<div class="col-xs-3"> <label for="account_name">PIC</label> </div>
				<div class="col-xs-3"> <label for="email">E-mail</label> </div>
				<div class="col-xs-2"> <label for="date_joined">Tanggal Daftar</label>	</div>
			</div>
			<?php
			foreach($model->tenants as $tenant)
			{
				?>
				<div class="row list-group">
					<a href="<?=site_url('account/account_detail/'.$tenant->id)?>">
						<div class="col-xs-2 list-group-item">
							<?=$tenant->tenant_id?> </div>
						<div class="col-xs-2 list-group-item">
							<?=$tenant->tenant_name?> </div>
						<div class="col-xs-3 list-group-item">
							<?=$tenant->account_name?> </div>
						<div class="col-xs-3 list-group-item">
							<?=$tenant->email?> </div>
						<div class="col-xs-2 list-group-item">
							<?=$tenant->date_joined?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('account/create_tenant')?>">
				Buat Akun
			</a>	
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Customer</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="customer_id">ID</label>	</div>
				<div class="col-xs-2"> <label for="customer_name">Nama</label> </div>
				<div class="col-xs-3"> <label for="email">E-mail</label> </div>
				<div class="col-xs-2"> <label for="date_joined">Tanggal Daftar</label>	</div>
			</div>
			<?php
			foreach($model->customers as $customer)
			{
				?>
				<div class="row list-group">
				<a href="<?=site_url('account/account_detail/'.$customer->id)?>">
					<div class="col-xs-2 list-group-item">
						<?=$customer->customer_id?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$customer->account_name?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$customer->email?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$customer->date_joined?> </div>
					</a>
					<?php
						if ($customer->status == "VERIFIED"){
							$show_div_verify = false;
						} else {
							$show_div_verify = true;
						}
					?>
					<div class="col-xs-3">
						<div class="col-xs-6" id="verify" <?php if ($show_div_verify == false){?> style="display:none"<?php } ?>>
							<button type="button" class="btn btn-default" onclick="popup.open('popup_verify')">Verifikasi</button>
						</div>
						<div class="col-xs-6" id="block">
							<button type="button" class="btn btn-default" onclick="popup.open('popup_block')">Blokir</button>
						</div>
					</div>
				</div>	
				<?php
			}
			?>
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Deliverer</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="deliverer_id">ID</label>	</div>
				<div class="col-xs-2"> <label for="deliverer_name">Nama</label> </div>
				<div class="col-xs-3"> <label for="email">E-mail</label> </div>
				<div class="col-xs-2"> <label for="date_joined">Tanggal Daftar</label>	</div>
			</div>
			<?php
			foreach($model->deliverers as $deliverer)
			{
				?>
				<a href="<?=site_url('account/account_detail/'.$deliverer->id)?>">
				<div class="row list-group">
					<div class="col-xs-2 list-group-item">
						<?=$deliverer->deliverer_id?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$deliverer->account_name?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$deliverer->email?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$deliverer->date_joined?> </div>
				</div>
				</a>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('account/create_deliverer')?>">
				Buat Akun
			</a>	
		</div>
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
						<button type="button" class="btn btn-default">Kirim</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_block')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>