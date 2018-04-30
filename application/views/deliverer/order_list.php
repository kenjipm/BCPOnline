<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<h2 class="cb-align-center">HISTORI PENUKARAN POIN</h2>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Tenant </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Unit </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Lantai </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Kode OTP </div>
		</div>
	</div>
	<?php
	foreach($model_reward_redeem->redeem_rewards as $redeem_reward)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$redeem_reward->date_redeemed?> </div>
			</div>
			<div class="cb-col-fifth-3">
				<div class="cb-align-center"> <?=$redeem_reward->reward->reward_description?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$redeem_reward->reward->points_needed?> </div>
			</div>
		</div>
		<?php
	}
	?>
</div>



<?php
	// Model untuk Order List
	
	// dummy data order list
	// $model->orders = array();
	
	// $model->orders[0] = new class{};
	// $model->orders[0]->id = 1;
	// $model->orders[0]->quantity = 1;
	// $model->orders[0]->posted_item = new class{};
	// $model->orders[0]->posted_item->name = "Djisamsung Galaksih";
	// $model->orders[0]->posted_item->tenant = "TsamTsung Store";
	// $model->orders[1] = new class{};
	// $model->orders[1]->id = 2;
	// $model->orders[1]->quantity = 1;
	// $model->orders[1]->posted_item = new class{};
	// $model->orders[1]->posted_item->name = "Kesing Appa Kamera";
	// $model->orders[1]->posted_item->tenant = "Oppah Store";
	// $model->orders[2] = new class{};
	// $model->orders[2]->id = 3;
	// $model->orders[2]->quantity = 2;
	// $model->orders[2]->posted_item = new class{};
	// $model->orders[2]->posted_item->name = "Kesing Djisamsung";
	// $model->orders[2]->posted_item->tenant = "TsamTsung Store";
	
?>


<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Pengambilan Barang</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="tenant_name">Tenant</label> </th>
							<th> <label for="tenant_unit">Unit</label> </th>
							<th> <label for="tenant_floor">Lantai</label> </th>
							<th> <label for="otp_deliverer_to_tenant">Kode OTP</label> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($model->order_list)
						{
							foreach($model->order_list as $order)
							{
								?>
								<tr>
									<td><?=$order->tenant?></td>
									<td><?=$order->unit_number?></td>
									<td><?=$order->floor?></td>
									<td><?=$order->otp_deliverer_to_tenant?></td>
								<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Pengiriman Barang</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="address">Alamat</label> </th>
							<th> <label for="customer">Nama Customer</label> </th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
							<?php
							if ($model->deliver_order_list)
							{
								foreach($model->deliver_order_list as $deliver)
								{
									?>
									<div class="form-group">
										<input type="hidden" class="form-control" name="bypass_otp" value="<?=$deliver->bypass_otp?>"/>
									</div>
									<tr>
										<td><?=$deliver->address . ", " . $deliver->city . ", Kecamatan " . $deliver->kecamatan . ", Kelurahan " . $deliver->kelurahan . ", " . $deliver->postal_code?></td>
										<td><?=$deliver->customer?></td>
										<td>
											<button class="btn btn-default" type="submit">Pembelian di Tempat</button>
										</td>
									</tr>
									<?php
								}
							}
							?>
						</form>
					</tbody>
				</table>
				<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
					<div class="form-group">
						<div class="col-sm-2">
							<label>Masukkan OTP:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="otp"/>
						</div>
						<div class="col-sm-2">
							<button class="btn btn-default" type="submit">Kirim</button>
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Pengambilan Repair</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="address">Alamat</label> </th>
							<th> <label for="customer">Nama Customer</label> </th>
							<th> <label for="otp_deliverer_to_tenant">Kode OTP</label> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($model->repair_list)
						{
							foreach($model->repair_list as $repair)
							{
								?>
								<tr>
									<td><?=$repair->address . ", " . $repair->city . ", Kecamatan " . $repair->kecamatan . ", Kelurahan " . $repair->kelurahan . ", " . $repair->postal_code?></td>
									<td><?=$repair->customer?></td>
									<td><?=$repair->otp_deliverer_to_customer?></td>
								</tr>
								<?php
							}
						}
						?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Pengiriman Repair</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="tenant_name">Tenant</label> </th>
							<th> <label for="tenant_unit">Unit</label> </th>
							<th> <label for="tenant_floor">Lantai</label> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($model->deliver_repair_list)
						{
							foreach($model->deliver_repair_list as $deliver)
							{
								?>
								<tr>
									<td><?=$deliver->tenant?></td>
									<td><?=$deliver->unit_number?></td>
									<td><?=$deliver->floor?></td>
								<?php
							}
						}
						?>
					</tbody>
				</table>
				<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
					<div class="form-group">
						<div class="col-sm-2">
							<label>Masukkan OTP:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" name="otp"/>
						</div>
						<div class="col-sm-2">
							<button class="btn btn-default" type="submit">Kirim</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

