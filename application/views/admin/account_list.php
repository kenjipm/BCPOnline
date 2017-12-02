<?php
	// Model untuk customer
	
	// dummy account list
	$model->tenants = array();
	$model->customers = array();
	$model->deliverers = array();
	
	// Model dummy tenant
	$model->tenants[0] = new class{};
	$model->tenants[0]->id = 1;
	$model->tenants[0]->tenant_id = "17120377701";
	$model->tenants[0]->account_name = "Yessy";
	$model->tenants[0]->tenant_name = "Henpon Senter";
	$model->tenants[0]->email = "yessy@gmail.com";
	$model->tenants[0]->date_joined = "03-12-2017";
	$model->tenants[1] = new class{};
	$model->tenants[1]->id = 2;
	$model->tenants[1]->tenant_id = "17120577704";
	$model->tenants[1]->account_name = "Yesi";
	$model->tenants[1]->tenant_name = "Leptop Canggih";
	$model->tenants[1]->email = "tesi@gmail.com";
	$model->tenants[1]->date_joined = "05-12-2017";
	$model->tenants[2] = new class{};
	$model->tenants[2]->id = 3;
	$model->tenants[2]->tenant_id = "17120877794";
	$model->tenants[2]->account_name = "Nosy";
	$model->tenants[2]->tenant_name = "Kamera Terkenal";
	$model->tenants[2]->email = "nosy@gmail.com";
	$model->tenants[2]->date_joined = "08-12-2017";
	
	// Model dummy customer
	$model->customers[0] = new class{};
	$model->customers[0]->id = 1;
	$model->customers[0]->customer_id = "17120377701";
	$model->customers[0]->customer_name = "Willy";
	$model->customers[0]->email = "willy@gmail.com";
	$model->customers[0]->date_joined = "03-12-2017";
	$model->customers[1] = new class{};
	$model->customers[1]->id = 2;
	$model->customers[1]->customer_id = "17120577704";
	$model->customers[1]->customer_name = "Christo";
	$model->customers[1]->email = "bill@gmail.com";
	$model->customers[1]->date_joined = "05-12-2017";
	$model->customers[2] = new class{};
	$model->customers[2]->id = 3;
	$model->customers[2]->customer_id = "17120877794";
	$model->customers[2]->customer_name = "Billy";
	$model->customers[2]->email = "billy@gmail.com";
	$model->customers[2]->date_joined = "08-12-2017";
	
	// Model dummy deliverer
	$model->deliverers[0] = new class{};
	$model->deliverers[0]->id = 1;
	$model->deliverers[0]->deliverer_id = "17120388801";
	$model->deliverers[0]->deliverer_name = "Dori";
	$model->deliverers[0]->email = "dori@gmail.com";
	$model->deliverers[0]->date_joined = "03-12-2017";
	$model->deliverers[1] = new class{};
	$model->deliverers[1]->id = 2;
	$model->deliverers[1]->deliverer_id = "17120588804";
	$model->deliverers[1]->deliverer_name = "Rido";
	$model->deliverers[1]->email = "rido@gmail.com";
	$model->deliverers[1]->date_joined = "05-12-2017";
	$model->deliverers[2] = new class{};
	$model->deliverers[2]->id = 3;
	$model->deliverers[2]->deliverer_id = "17120888898";
	$model->deliverers[2]->deliverer_name = "Rodi";
	$model->deliverers[2]->email = "rodi@gmail.com";
	$model->deliverers[2]->date_joined = "08-12-2017";
	
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
				<div class="col-xs-2"> <label for="email">E-mail</label> </div>
				<div class="col-xs-2"> <label for="date_joined">Tanggal Daftar</label>	</div>
			</div>
			<?php
			foreach($model->tenants as $tenant)
			{
				?>
				<div class="row list-group">
					<div class="col-xs-2 list-group-item">
						<?=$tenant->tenant_id?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$tenant->tenant_name?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$tenant->account_name?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$tenant->email?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$tenant->date_joined?> </div>
					<div class="col-xs-1">
						<a href="<?=site_url('admin/account_detail/'.$tenant->id)?>">
							<button class="btn btn-default">Lihat</button>
						</a></div>	
						
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('admin/create_tenant')?>">
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
				<div class="col-xs-3"> <label for="customer_name">Nama</label> </div>
				<div class="col-xs-2"> <label for="email">E-mail</label> </div>
				<div class="col-xs-2"> <label for="date_joined">Tanggal Daftar</label>	</div>
			</div>
			<?php
			foreach($model->customers as $customer)
			{
				?>
				<div class="row list-group">
					<div class="col-xs-2 list-group-item">
						<?=$customer->customer_id?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$customer->customer_name?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$customer->email?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$customer->date_joined?> </div>
					<div class="col-xs-1">
						<a href="<?=site_url('admin/account_detail/'.$customer->id)?>">
							<button class="btn btn-default">Lihat</button>
						</a></div>	
						
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
				<div class="col-xs-3"> <label for="deliverer_name">Nama</label> </div>
				<div class="col-xs-2"> <label for="email">E-mail</label> </div>
				<div class="col-xs-2"> <label for="date_joined">Tanggal Daftar</label>	</div>
			</div>
			<?php
			foreach($model->deliverers as $deliverer)
			{
				?>
				<div class="row list-group">
					<div class="col-xs-2 list-group-item">
						<?=$deliverer->deliverer_id?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$deliverer->deliverer_name?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$deliverer->email?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$deliverer->date_joined?> </div>
					<div class="col-xs-1">
						<a href="<?=site_url('admin/account_detail/'.$deliverer->id)?>">
							<button class="btn btn-default">Lihat</button>
						</a></div>	
						
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('admin/create_deliverer')?>">
				Buat Akun
			</a>	
		</div>
	</div>
</div>