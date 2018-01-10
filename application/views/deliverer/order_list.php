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
						</tr>
					</thead>
					<tbody>
						<?php
						if ($model->deliver_list)
						{
							foreach($model->deliver_list as $deliver)
							{
								?>
								<tr>
									<td><?=$deliver->address . ", " . $deliver->city . ", Kecamatan " . $deliver->kecamatan . ", Kelurahan " . $deliver->kelurahan . ", " . $deliver->postal_code?></td>
									<td><?=$deliver->customer?></td>
								</tr>
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
							<button class="btn btn-default" type="submit" class="btn btn-default">Kirim</button>
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>
